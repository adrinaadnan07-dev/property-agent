<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('agentName', env('AGENT_NAME', 'Property Agent'));
            $view->with('agentPhone', env('AGENT_PHONE', '60123456789'));
            $view->with('agentEmail', env('AGENT_EMAIL', 'agent@example.com'));
            $view->with('agentCompany', env('AGENT_COMPANY', 'Your Agency'));
            $view->with('agentTagline', env('AGENT_TAGLINE', ''));
        });
    }
}
