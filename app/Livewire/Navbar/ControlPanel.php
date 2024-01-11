<?php

namespace App\Livewire\Navbar;

use Illuminate\Support\Arr;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

abstract class ControlPanel extends Component
{
    public $showBreadcrumbs = true, $showCreateButton = true, $showPagination = false, $showIndicators= false;
    public $createButtonLabel = 'Nouveau';

    public $breadcrumbs = [];

    // Configurable options
    public $separator = '/';
    public $urlPrefix = '';

    public $currentPage;

    public $new;

    public function render()
    {
        return view('livewire.navbar.control-panel');
    }

    public function switchButtons() : array{
        return [];
    }


    public function generateBreadcrumbs()
    {
        $segments = request()->segments();

        foreach ($segments as $key => $segment) {
            $url = implode('/', array_slice($segments, 0, $key + 1));

            // Prefix the URL if specified
            $url = $this->urlPrefix ? $this->urlPrefix . '/' . $url : $url;

            $this->breadcrumbs[] = [
                'url' => url($url),
                'label' => ucwords(str_replace(['-', '_'], ' ', $segment)),
            ];
        }
    }

    public function saveUpdate(){
        $this->dispatch('saveChange');
    }

}
