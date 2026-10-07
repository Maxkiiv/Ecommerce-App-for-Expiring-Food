<x-layouts.layout-default>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"
                class="mx-auto h-10 w-auto" />
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- Session Status -->
            <x-auth-session-status class="text-center" :status="session('status')" />

            <x-passkey-verify />

            <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-black-100">Email address</label>
                    <div class="mt-2">
                        <input id="email" type="email" name="email" required autocomplete="email"
                            label="__('Email address')" value="{{ old('email') }}"
                            class="block w-full rounded-md px-3 py-1.5 text-base outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 input" />
                    </div>
                </div>
                @error('email')
                    <span class="invalid-feedback text-error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-black-100">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" type="password" name="password" required name="password" :label="__('Password')"
                            autocomplete="current-password"
                            class="block w-full rounded-md px-3 py-1.5 text-base outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6 input" />
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign
                        in</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-400">
                Not a member?
                <a href="{{ route('register') }}" class="font-semibold text-indigo-400 hover:text-indigo-300">Sign Up</a>
            </p>
        </div>
    </div>


</x-layouts.layout-default>
