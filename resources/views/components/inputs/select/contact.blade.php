@props([
    'value',
    'data'
])

@php
    $contacts = \Modules\Contact\Entities\Contact::isCompany(current_company()->id)->get();
@endphp

<div class="d-flex" style="margin-bottom: 8px;">
    <!-- Customer -->
    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
        <label class="k_form_label" for="contact">
            {{ $value->label }} :
        </label>
    </div>
    <div class="k_cell k_wrap_input flex-grow-1">
        <select wire:model.live="{{ $value->model }}" id="" class="k_input">
            <option value=""></option>
            @foreach($contacts as $contact)
            <option value="{{ $contact->id }}">{{ $contact->name }}</option>
            @endforeach
        </select>
        {{-- <!-- Input Form
        <div class="dropdown w-100">
            <input type="text" class="k_input dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" wire:model="{{ $value->model }}" wire:keydown="searchContacts" />
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @forelse ($contacts as $customer)
                    <li class="dropdown-item cursor-pointer" wire:click="selectContact({{ $customer->id }})">
                        {{ $customer->name }}
                    </li>
                @empty
                    <li class="dropdown-item cursor-pointer">
                        No matching contacts found
                    </li>
                @endforelse
            </ul>
        </div>--> --}}
        @error($value->model) <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

{{-- <script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('contactSelected', function (contactId) {
            // Update the input value when a contact is selected
            var input = document.querySelector('[wire:model="{{ $value->model }}"]');
            var selectedContact = document.querySelector('[wire:click="selectContact(' + contactId + ')"]');
            if (input && selectedContact) {
                input.value = selectedContact.textContent.trim();
            }
        });
    });
</script> --}}
