<?php

namespace App\Traits;

trait ToastMagic
{
    /**
     * Dispatches a Livewire event to trigger a ToastMagic notification.
     *
     * @param string $type The toast type ('success', 'error', 'warning', 'info').
     * @param string $title The main title of the toast.
     * @param string $message The descriptive message of the toast.
     * @param array $options Optional additional ToastMagic configuration options.
     * @return void
     */
    public function showToast(string $type, string $title, string $message, array $options = []): void
    {
        // Livewire Toaster Magic listens for the 'toastMagic' event
        $this->dispatch(
            'toastMagic',
            status: $type,
            title: $title,
            message: $message,
            options: $options
        );
    }

    /**
     * Convenience method for a Success notification.
     */
    public function toastSuccess(string $title, string $message = '', array $options = []): void
    {
        $this->showToast('success', $title, $message, $options);
    }

    /**
     * Convenience method for an Error notification.
     */
    public function toastError(string $title, string $message = '', array $options = []): void
    {
        $this->showToast('error', $title, $message, $options);
    }

    /**
     * Convenience method for a Warning notification.
     */
    public function toastWarning(string $title, string $message = '', array $options = []): void
    {
        $this->showToast('warning', $title, $message, $options);
    }

    // Add toastInfo() if you need it as well
}
