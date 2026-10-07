<?php

use App\Concerns\ProfileValidationRules;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Profile settings')] class extends Component {
    use ProfileValidationRules;

    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate($this->profileRules($user->id));

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        Flux::toast(variant: 'success', text: __('Profile updated.'));
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    #[Computed]
    public function hasUnverifiedEmail(): bool
    {
        return Auth::user() instanceof MustVerifyEmail && !Auth::user()->hasVerifiedEmail();
    }

    #[Computed]
    public function showDeleteUser(): bool
    {
        return !Auth::user() instanceof MustVerifyEmail || (Auth::user() instanceof MustVerifyEmail && Auth::user()->hasVerifiedEmail());
    }
}; ?>


<section class="w-full max-w-4xl mx-auto px-4 py-8">
    <!-- Settings Heading -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            {{ __('Settings') }}
        </h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Manage your account settings and preferences') }}
        </p>
    </div>

    <x-ui.tabs.profile-tab />

    <!-- Profile Settings Content -->
    <div
        class="bg-white dark:bg-gray-800-removed rounded-lg shadow-sm-removed border-removed border-gray-200-removed dark:border-gray-700 p-6">
        <div class="mb-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                {{ __('Profile') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Update your name and email address') }}
            </p>
        </div>

        <form wire:submit="updateProfileInformation" class="space-y-6">
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Name') }}
                </label>
                <input wire:model="name" id="name" type="text" required autofocus autocomplete="name"
                    class="input input-bordered w-full">
                @error('name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Email') }}
                </label>
                <input wire:model="email" id="email" type="email" required autocomplete="email"
                    class="input input-bordered w-full">
                @error('email')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Unverified Email Warning -->
            @if ($this->hasUnverifiedEmail)
                <div
                    class="rounded-lg bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700 dark:text-yellow-300">
                                {{ __('Your email address is unverified.') }}
                                <button wire:click.prevent="resendVerificationNotification"
                                    class="font-medium text-yellow-700 dark:text-yellow-300 underline hover:text-yellow-600 dark:hover:text-yellow-200">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Save Button -->
            <div class="flex items-center justify-end">
                <button type="submit" data-test="update-profile-button" class="btn btn-primary"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove>{{ __('Save') }}</span>
                    <span wire:loading>
                        <span class="loading loading-spinner loading-xs"></span>
                        {{ __('Saving...') }}
                    </span>
                </button>
            </div>
        </form>

        <!-- Delete User Section -->
        @if ($this->showDeleteUser)
            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                <livewire:pages::settings.delete-user-form />
            </div>
        @endif
    </div>
</section>
