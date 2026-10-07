<div>
        <!-- Settings Navigation -->
    <div class="mb-6 border-b border-gray-200 dark:border-gray-700">
        <nav class="-mb-px flex space-x-8" aria-label="Settings tabs">
            <!-- Profile Link -->
            <a
                href="{{ route('profile.edit') }}"
                class="{{ request()->routeIs('profile.edit') ? 'border-blue-500 text-blue-600 dark:text-blue-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300' }} whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium"
            >
                {{ __('Profile') }}
            </a>

            <!-- Security Link -->
            <a
                href="{{ route('security.edit') }}"
                class="{{ request()->routeIs('security.edit') ? 'border-blue-500 text-blue-600 dark:text-blue-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300' }} whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium"
            >
                {{ __('Security') }}
            </a>

            <!-- API Tokens Link (if needed) -->
            <a
                href="{{ route('appearance.edit') }}"
                class="{{ request()->routeIs('appearance.edit') ? 'border-blue-500 text-blue-600 dark:text-blue-400' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300' }} whitespace-nowrap border-b-2 px-1 py-4 text-sm font-medium"
            >
                {{ __('Appearance') }}
            </a>

        </nav>
    </div>

</div>
