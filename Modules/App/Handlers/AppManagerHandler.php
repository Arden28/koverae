<?php
namespace Modules\App\Handlers;


class AppManagerHandler extends AppHandler
{
    protected function getModuleSlug()
    {
        return 'apps';
    }

    protected function handleInstallation()
    {
        // Example: Create blog-related tables and initial configuration
    }

    protected function handleUninstallation()
    {
        // Example: Drop blog-related tables and clean up configurations
    }
}
