<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Appearance settings')] class extends Component {
    //
};
?>

<div>
    <section class="w-full max-w-4xl mx-auto px-4 py-8">
        <!-- Settings Navigation -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                {{ __('Settings') }}
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Manage your account settings and preferences') }}
            </p>
        </div>

        <!-- Settings Navigation -->
        <x-ui.tabs.profile-tab />

        <!-- Appearance Settings -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <div class="mb-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                    {{ __('Appearance') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Update the appearance settings for your account') }}
                </p>
            </div>

            <!-- Theme Options -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Light Theme -->
                <a href="{{ route('theme.set', 'light') }}"
                    class="relative rounded-lg border-2 p-4 text-center transition-all duration-200
                    {{ session('theme', 'light') === 'light' ? 'ring-2 ring-blue-500 border-blue-500' : 'border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500' }}">
                    <div class="flex flex-col items-center gap-2">
                        <svg class="h-8 w-8 text-gray-700 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Light') }}</span>
                    </div>
                    @if (session('theme', 'light') === 'light')
                        <div class="absolute top-2 right-2">
                            <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @endif
                </a>

                <!-- Dark Theme -->
                <a href="{{ route('theme.set', 'dark') }}"
                    class="relative rounded-lg border-2 p-4 text-center transition-all duration-200
                    {{ session('theme', 'light') === 'dark' ? 'ring-2 ring-blue-500 border-blue-500' : 'border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500' }}">
                    <div class="flex flex-col items-center gap-2">
                        <svg class="h-8 w-8 text-gray-700 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('Dark') }}</span>
                    </div>
                    @if (session('theme', 'light') === 'dark')
                        <div class="absolute top-2 right-2">
                            <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @endif
                </a>

                <!-- System Theme (Optional - remove if not needed) -->
                <a href="{{ route('theme.set', 'system') }}"
                    class="relative rounded-lg border-2 p-4 text-center transition-all duration-200
                    {{ session('theme', 'light') === 'system' ? 'ring-2 ring-blue-500 border-blue-500' : 'border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500' }}">
                    <div class="flex flex-col items-center gap-2">
                        <svg class="h-8 w-8 text-gray-700 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                        </svg>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ __('System') }}</span>
                    </div>
                    @if (session('theme', 'light') === 'system')
                        <div class="absolute top-2 right-2">
                            <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    @endif
                </a>
            </div>
        </div>
    </section>
</div>
