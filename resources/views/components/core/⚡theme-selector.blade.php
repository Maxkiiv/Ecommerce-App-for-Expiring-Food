<?php

use Livewire\Component;

new class extends Component {
    public string $theme = 'light';

    public function mount()
    {
        $this->theme = session('theme', 'light');
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
        session(['theme' => $theme]);

        // Update the HTML data-theme attribute
        $this->dispatch('theme-updated', theme: $theme);
    }
};
?>

<div>
    <button wire:click="setTheme('light')" class="px-4 py-2 rounded {{ $theme === 'light' ? 'bg-primary text-white' : 'bg-base-200' }}">
        Light
    </button>
    <button wire:click="setTheme('dark')" class="px-4 py-2 rounded {{ $theme === 'dark' ? 'bg-primary text-white' : 'bg-base-200' }}">
        Dark
    </button>
    <button wire:click="setTheme('system')" class="px-4 py-2 rounded {{ $theme === 'system' ? 'bg-primary text-white' : 'bg-base-200' }}">
        System
    </button>
</div>

<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('theme-updated', (data) => {
            if (data.theme === 'system') {
                const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
            } else {
                document.documentElement.setAttribute('data-theme', data.theme);
            }
        });
    });

    // Initial theme load
    if (localStorage.theme === 'system' || !('theme' in localStorage)) {
        document.documentElement.setAttribute('data-theme',
            window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        );
    }
</script>
