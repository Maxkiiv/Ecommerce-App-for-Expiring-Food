<?php

namespace App\Providers;

use App\Helpers\CustomHelper;
use Carbon\CarbonImmutable;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();

        // CORE::Global alias for CustomHelper
        AliasLoader::getInstance()->alias('CustomHelper', CustomHelper::class);

        // CORE::Redirect login to route
        Event::listen(Login::class, function (Login $event) {
            if ($event->user->role === 'admin') {
                session(['url.intended' => route('filament.admin.pages.dashboard')]);
            }
        });
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(
            fn(): ?Password => app()->isProduction()
                ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
                : null,
        );
    }
}
