<?php

namespace Modules\Contact\Livewire\Tag;

use Livewire\Component;
use Modules\Contact\Entities\ContactTag as Tag;

class Create extends Component
{
    public $name, $color = "#FFFFFF" , $parent, $is_active = true;

    public $rules = [
        'name' => 'required|string|max:50',
        'color' => 'nullable|string',
        'parent' => 'nullable|integer',
        'is_active' => 'boolean'
    ];

    public function storeTag(){
        $this->validate();
        $tag = Tag::create([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'color' => $this->color,
            'parent_id' => $this->parent,
            'is_active' => $this->is_active
        ]);
        $tag->save();

        notify()->success("Nouvelle étiquette ajoutée !");

        return $this->redirect(route('contacts.tags.show', ['subdomain' => current_company()->domain_name, 'tag' => $tag->id]), navigate:true);

    }
    public function render()
    {
        $tags = Tag::isCompany(current_company()->id)->orderBy('id', 'DESC')->get();
        return view('contact::livewire.tag.create', compact('tags'))
        ->extends('layouts.master');
    }
}
