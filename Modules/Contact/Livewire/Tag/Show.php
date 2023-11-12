<?php

namespace Modules\Contact\Livewire\Tag;

use Livewire\Component;
use Modules\Contact\Entities\ContactTag as Tag;

class Show extends Component
{
    public Tag $tag;

    public $name, $color, $parent, $is_active = true;

    public $rules = [
        'name' => 'required|string|max:50',
        'color' => 'nullable|string',
        'parent' => 'nullable|integer',
        'is_active' => 'boolean'
    ];
    public function mount(Tag $tag){
        $this->tag = $tag;
        $this->name = $tag->name;
        $this->color = $tag->color;
        $this->parent = $tag->parent_id;
        
        $this->is_active = $tag->is_active;
    }

    public function updateTag(Tag $tag){
        $this->validate();
        $tag->update([
            // 'company_id' => current_company()->id,
            'name' => $this->name,
            'color' => $this->color,
            'parent_id' => $this->parent,
            'is_active' => $this->is_active
        ]);
        $tag->save();
    }

    public function render()
    {
        $tags = Tag::isCompany(current_company()->id)->where('id', '<>' ,$this->tag->id)->orderBy('id', 'DESC')->get();
        return view('contact::livewire.tag.show', compact('tags'))
        ->extends('layouts.master');
    }
}
