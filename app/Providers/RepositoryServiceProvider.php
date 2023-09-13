<?php

namespace App\Providers;

use App\Repositories\ApplicationRepository;
use App\Repositories\CommunicationRepository;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;
use App\Repositories\Interfaces\CommunicationRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerApplicationRepository();
        $this->registerCommunicationRepository();
    }

    /**
     * Bootstrap services.
     */
    public function registerApplicationRepository()
    {
        $this->app->bind(
            ApplicationRepositoryInterface::class, ApplicationRepository::class
        );
    }

    public function registerCommunicationRepository()
    {
        $this->app->bind(
            CommunicationRepositoryInterface::class, CommunicationRepository::class
        );
    }
     public function boot(): void
    {
        
    }
}
