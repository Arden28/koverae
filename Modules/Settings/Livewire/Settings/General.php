<?php

namespace Modules\Settings\Livewire\Settings;

use App\Livewire\Settings\AppSetting;
use App\Livewire\Settings\Block;
use App\Livewire\Settings\Box;
use Livewire\Component;

class General extends AppSetting
{

    public function blocks() : array
    {
        return [
            Block::make('users', 'Utilisateurs'),
            Block::make('languages', 'Langues'),
            Block::make('companies', 'Entreprises'),
            Block::make('uom', 'Unités de mesure'),
            Block::make('analytics', 'Analyses'),
            Block::make('permissions', 'Permissions'),
            Block::make('integrations', 'Intégrations'),
            Block::make('devs', 'Développeurs'),
            Block::make('about', 'Koverae'),
            // Add more buttons as needed
        ];
    }

    public function boxes() : array
    {
        return [
            Box::make('invite_users', 'Inviter des utilisateurs', 'invitation', ' ', 'users', false),
            Box::make('invite_users', 'Inviter des utilisateurs', 'invitation', 'Ici vous allez pouvoir inviter des utilisateurs.', 'users', true),
            // Add more buttons as needed
        ];
    }

}
