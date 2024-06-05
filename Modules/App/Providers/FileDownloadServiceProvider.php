<?php

namespace Modules\App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\App\Services\Files\FileDownloadService;

class FileDownloadServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->bind('filedownloadservice', function ($app) {
            return new FileDownloadService();
        });
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}