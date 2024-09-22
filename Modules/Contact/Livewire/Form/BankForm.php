<?php

namespace Modules\Contact\Livewire\Form;

use Modules\App\Livewire\Components\Form\Template\SimpleAvatarForm;
use Modules\App\Livewire\Components\Form\Input;
use Modules\App\Livewire\Components\Form\Tabs;
use Modules\App\Livewire\Components\Form\Group;
use Modules\App\Livewire\Components\Form\Button\ActionBarButton;
use Modules\App\Livewire\Components\Form\Button\StatusBarButton;
use Modules\App\Livewire\Components\Form\Button\ActionButton;
use Modules\App\Livewire\Components\Form\Capsule;
use Modules\App\Livewire\Components\Form\Table;
use Modules\App\Livewire\Components\Table\Column;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Modules\Contact\Entities\Bank\Bank;

class BankForm extends SimpleAvatarForm
{
    use ActionBarButtonTrait, WithFileUploads;

    public $bank;
    public $name, $code, $phone, $email, $website, $street, $street2, $city, $country, $zip, $image_path, $photo = null;

    protected $rules = [
        'name' => 'required|string|max:100',
        'code' => 'required',
        'phone' => ['nullable', 'string'], // Mobile validation example
        'email' => 'nullable|email',
        'street' => 'nullable|string|max:40',
        'street2' => 'nullable|string|max:40',
        'city' => 'nullable|string|max:20',
        'country' => 'nullable|integer|exists:countries,id',
        'zip' => 'nullable|string|max:9',
        'website' => 'nullable|url', // Validate that the website is a valid URL
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];
    public function mount($bank = null){
        if($bank){
            $this->bank = $bank;
            $this->image_path = $bank->avatar;
            $this->name = $bank->name;
            $this->code = $bank->bic;
            $this->phone = $bank->phone;
            $this->email = $bank->email;
            $this->street = $bank->street;
            $this->street2 = $bank->street2;
            $this->city = $bank->city;
            $this->country = $bank->country_id;
            $this->website = $bank->website;
            $this->zip = $bank->zip;
            // $this->image_path = Storage::url($bank->image_path);
        }
    }

    public function inputs() : array
    {
        return [
            Input::make('name', null, 'text', 'name', 'top-title', 'none', 'none', __('e.g. Kenya Commercial Bank'))->component('form.input.ke-title'),
            Input::make('code', __('Bank Identifier Code'), 'text', 'code', 'left', 'none', 'none'),
            Input::make('address', __('Bank Address'), 'select', 'address', 'left', 'none', 'none')->component('form.input.select.address'),
            Input::make('email', __('Email'), 'email', 'email', 'right', 'none', 'none', null),
            Input::make('phone', __('Phone'), 'tel', 'phone', 'right', 'none', 'none', null),
            Input::make('website', __('Website'), 'text', 'website', 'right', 'none', 'none', null),
        ];
    }

    public function updatedPhoto(){
        // Validate the uploaded file
        $this->validate();
        if($this->bank){
            $bank = Bank::find($this->bank->id);
    
            if(!$this->image_path){
                $this->image_path = $bank->id . '_bank.png';
    
                // $this->photo->storeAs('avatars', $this->image_path, 'public');
                $bank->update([
                    'avatar' => $this->image_path,
                ]);
            }
    
            $this->photo->storeAs('avatars', $this->image_path, 'public');
    
    
            // Send success message
            session()->flash('message', 'Avatar updated successfully!');
        }
    }

    #[On('update-bank')]
    public function updateBank(){

        $this->validate();

        $bank = Bank::find($this->bank->id);

        $this->validate();
        if(!$this->image_path){
            $this->image_path = $bank->id . '_bank.png';
        }
        if($this->photo){
            $this->photo->storeAs('avatars', $this->image_path, 'public');
        }
        $bank->update([
            'name' => $this->name,
            'bic' => $this->code,
            'phone' => $this->phone,
            'email' => $this->email,
           'street' => $this->street,
           'street2' => $this->street2,
            'city' => $this->city,
            'country_id' => $this->country,
            'zip' => $this->zip,
            'website' => $this->website,
        ]);
        $bank->save();

        return redirect()->route('contacts.banks.show', ['subdomain' => current_company()->domain_name, 'bank' => $bank->id, 'menu' => current_menu()]);
    }

    #[On('create-bank')]
    public function createBank(){
        $this->validate();
        $bank = Bank::create([
            'company_id' => current_company()->id,
            'name' => $this->name,
            'bic' => $this->code,
            'phone' => $this->phone,
            'email' => $this->email,
           'street' => $this->street,
           'street2' => $this->street2,
            'city' => $this->city,
            'country_id' => $this->country,
            'zip' => $this->zip,
            'website' => $this->website,
        ]);
        $bank->save();
        
        $avatar = $bank->id.'_bank.png';
        if($this->photo){
            $this->photo->storeAs('avatars', $avatar, 'public');
        }
        $bank->update([
            'avatar' => $avatar,
        ]);

        return redirect()->route('contacts.banks.show', ['subdomain' => current_company()->domain_name, 'bank' => $bank->id, 'menu' => current_menu()]);
    }
}
