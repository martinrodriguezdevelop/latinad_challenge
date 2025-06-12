<?php

namespace App\Providers;

use App\UseCases\Adapters\CalculateNearestPharmacyUseCase;
use App\UseCases\Adapters\CreatePharmacyUseCase;
use App\UseCases\Contracts\CalculateNearestPharmacyInterface;
use App\UseCases\Contracts\CreatePharmacyInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
