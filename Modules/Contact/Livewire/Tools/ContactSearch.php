<?php

namespace Modules\Contact\Livewire\Tools;

use Livewire\Component;
use Illuminate\Support\Collection;
use Modules\Contact\Entities\Contact;

class ContactSearch extends Component
{
    public $query;
    public $search_results;
    public $how_many;
    public $value;


    public function mount() {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = Collection::empty();
    }
    public function render()
    {
        return view('contact::livewire.tools.contact-search');
    }
        public function updatedQuery() {
            $this->search_results = Contact::isCompany(current_company()->id)->where('name', 'like', '%' . $this->query . '%')
                ->orWhere('email', 'like', '%' . $this->query . '%')
                ->take($this->how_many)->get();
        }

        public function loadMore() {
            $this->how_many += 5;
            $this->updatedQuery();
        }

        public function resetQuery() {
            $this->query = '';
            $this->how_many = 5;
            $this->search_results = Collection::empty();
        }

        public function selectContact($contact) {
            $this->dispatch('contactSelected', $contact);
            // return $this->query = 'motherfucker';
        }
}
