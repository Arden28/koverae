<?php

namespace Modules\Contact\Livewire\Form;

use Livewire\Attributes\On;
use Modules\App\Livewire\Components\Form\BaseForm;
use Modules\App\Livewire\Components\Form\Input;
use Modules\App\Livewire\Components\Form\Template\SimpleForm;
use Modules\Contact\Entities\ContactTag;

class ContactTagForm extends BaseForm
{
    public $tag;
    public $name, $color = "#FFFFFF", $parent;
    public bool $is_active = true;
    public array $categories = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'color' => 'required|string',
        'parent' => 'nullable|exists:contact_tags,id',
        'is_active' => 'boolean'
    ];

    public function mount($tag = null){
        if($tag){
            $this->tag = $tag;
            $this->name = $tag->name;
            $this->color = $tag->color;
            $this->parent = $tag->parent_id;
            $this->is_active = $tag->is_active;
        }
        $categories = ContactTag::isCompany(current_company()->id)->get();
        $this->categories = toSelectOptions($categories, 'id', 'name');

    }

    public function inputs(): array
    {
        return [
            Input::make('name', __('Name'), 'text', 'name', 'left', 'none', 'none', __('e.g. ""Product Tour')),
            Input::make('color', __('Color'), 'color', 'color', 'right', 'none', 'none'),
            Input::make('parent', __('Category'), 'select', 'parent', 'left', 'none', 'none', "", null, $this->categories),
        ];
    }
    
    #[On('create-contact-tag')]
    public function createContactTag(){
        $this->validate();

        $tag = ContactTag::create([
            'name' => $this->name,
            'color' => $this->color,
            'parent_id' => $this->parent,
            'company_id' => current_company()->id,
        ]);
        $tag->save();

        session()->flash('success', __('Tag created successfully.'));

        return redirect()->route('contacts.tags.show', ['subdomain' => current_company()->domain_name, 'tag' => $tag->id, 'menu' => current_menu()]);
    }
    
    #[On('update-contact-tag')]
    public function updateContactTag(){
        $this->validate();
        $tag = ContactTag::find($this->tag->id)->first();

        $tag->update([
            'name' => $this->name,
            'color' => $this->color,
            'parent_id' => $this->parent,
        ]);

        session()->flash('success', __('Tag updated successfully.'));

        return redirect()->route('contacts.tags.show', ['subdomain' => current_company()->domain_name, 'tag' => $tag->id, 'menu' => current_menu()]);
    }
}
