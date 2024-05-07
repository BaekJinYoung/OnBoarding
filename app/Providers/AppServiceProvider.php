<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\BoardPolicy;
use App\Models\Board;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        Board::class => BoardPolicy::class,
    ];

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
    public function boot()
    {
        $this->registerPolicies();
    }
}
