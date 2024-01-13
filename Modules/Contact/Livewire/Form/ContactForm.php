<?php

namespace Modules\Contact\Livewire\Form;

use Livewire\Component;

class ContactForm extends Component
{
    public function render()
    {
        return <<<'blade'
            <div>
                <h3>The <code>ContactForm</code> livewire component is loaded from the <code>Contact</code> module.</h3>
            </div>
        blade;
    }
}
