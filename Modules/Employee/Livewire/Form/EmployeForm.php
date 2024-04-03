<?php

namespace Modules\Employee\Livewire\Form;

use App\Livewire\Form\Template\SimpleAvatarForm;
use App\Livewire\Form\Input;
use App\Livewire\Form\Tabs;
use App\Livewire\Form\Group;
use App\Livewire\Form\Button\ActionBarButton;
use App\Livewire\Form\Button\StatusBarButton;
use App\Livewire\Form\Button\ActionButton;
use App\Livewire\Form\Capsule;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Employee\Entities\Employee;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class EmployeForm extends SimpleAvatarForm
{
    use ActionBarButtonTrait;

    public $employee;

    public $name, $jobTitle, $work_phone, $work_mobile, $work_email, $society, $department, $manager, $job;

    public $work_address, $workplace, $role, $default_role;

    public $street, $street2, $city, $zip, $state, $country, $personal_email, $personal_phone, $bank_account_id, $language;

    public $marital, $children_no;

    public $contact_name, $contact_phone;

    public $certificate_level, $study_field, $school;

    public $visa_no, $work_permit_no, $visa_expiration_date, $work_permit_expiration_date;

    public $nationality, $national_id, $passport_no, $gender, $birthday, $birth_place, $birth_country, $is_resident;

    public $employee_type, $pin_code, $badge_id;

    public bool $updateMode = false;

    public function mount($employee = null){
        if($employee){
            $this->updateMode = true;
            $this->name = $this->employee->user->name;
            $this->jobTitle = $this->employee->job->title;
            $this->work_phone = $this->employee->user->phone;
            // $this->mobile = $this->employee->user->phone_2;
            $this->work_email = $this->employee->user->email;
            $this->department = $this->employee->department_id;
            $this->job = $this->employee->job->id;
            $this->manager = $this->employee->manager_id;
            // Professional Information
            $this->work_address = $this->employee->work_address;
            $this->workplace = $this->employee->workplace_id;
            //Personal Information
            $this->street = $this->employee->street;
            $this->city = $this->employee->city;
            $this->zip = $this->employee->zip;
            $this->state = $this->employee->state;
            $this->country = $this->employee->country;
            $this->personal_email = $this->employee->personal_email;
            $this->personal_phone = $this->employee->personal_phone;
            $this->bank_account_id = $this->employee->bank_account_id;
            $this->language = $this->employee->language;
            // Family Information
            $this->marital = $this->employee->marital_status;
            $this->children_no = $this->employee->children_no;
            // Education
            $this->certificate_level = $this->employee->certificate_level;
            $this->study_field = $this->employee->study_field;
            $this->school = $this->employee->school_study;
            // Emergency
            $this->contact_name = $this->employee->contact_name;
            $this->contact_phone = $this->employee->contact_phone;
            // Citizenship
            $this->nationality = $this->employee->nationality;
            $this->national_id = $this->employee->national_id;
            $this->passport_no = $this->employee->passport_no;
            $this->gender = $this->employee->gender;
            $this->birthday = $this->employee->birthday;
            $this->birth_place = $this->employee->birth_place;
            $this->birth_country = $this->employee->birth_country;
            $this->is_resident = $this->employee->is_resident;
            // Work Permit
            $this->visa_no = $this->employee->visa_no;
            $this->work_permit_no = $this->employee->work_permit_no;
            $this->visa_expiration_date = $this->employee->visa_expiration_date;
            $this->work_permit_expiration_date = $this->employee->work_permit_expiration_date;
            // HR Settings
            $this->employee_type = $this->employee->type;
            $this->pin_code = $this->employee->pin_code;
            $this->badge_id = $this->employee->cypher_id;
        }
    }

    protected $rules = [
        'name' => 'required|string|max:50',
        // 'mobile' => 'nullable|string|max:60',
        'work_phone' => 'nullable|string|max:60',
        'work_email' => 'nullable|string|email|max:255',
        'society' => 'nullable|integer',
        'department' => 'nullable|integer',
        'job' => 'nullable|integer',
        'manager' => 'nullable|integer|gt:0',
        // Location
        'work_address' => 'nullable|string|max:100',
        'workplace' => 'nullable|integer|gt:0',
        'role' => 'nullable|string|max:60',
        'default_role' => 'nullable|string|max:60',
        // Personnal Info
        'street' => 'nullable|string|max:50',
        'street2' => 'nullable|string|max:50',
        'state' => 'nullable|string|max:50',
        'city' => 'nullable|string|max:50',
        'zip' => 'nullable|string',
        'country' => 'nullable|string',
        'personal_email' => 'nullable|string|email|max:255|unique:'.Employee::class,
        'personal_phone' => 'nullable|min:9|unique:'.Employee::class,
        'bank_account_id' => 'nullable|integer|max:255|unique:'.Employee::class,
        // Family Context Information
        'marital' => 'nullable|string',
        'children_no' => 'nullable|string',
        // Emergecy case
        'contact_name' => 'nullable|string|max:100',
        'contact_phone' => 'nullable|integer',
        // Educational Information
        'certificate_level' => 'nullable|string|max:100',
        'study_field' => 'nullable|string|max:100',
        'school' => 'nullable|string|max:100',
        // Citizeship
        'nationality' => 'nullable|string|max:100',
        'national_id' => 'nullable|string|max:100',
        'passport_no' => 'nullable|string|max:100',
        'gender' => 'nullable|string',
        'birthday' => 'nullable',
        'birth_place' => 'nullable|string|max:100',
        'birth_country' => 'nullable|string|max:100',
        // 'is_resident' => 'nullable|boolean',
        // Work Permit
        'visa_no' => 'nullable|string|integer',
        'work_permit_no' => 'nullable|string|integer',
        'visa_expiration_date' => 'nullable',
        'work_permit_expiration_date' => 'nullable',
        'employee_type' => 'nullable',
        'pin_code' => 'nullable|string|integer|max:5|min:5|unique:'.Employee::class,
        'badge_id' => 'nullable|string|integer|max:12|min:12',

    ];

    public function inputs() : array
    {
        return  [
            // make($key, $label, $type, $model, $position, $tab, $group)
            Input::make('name',"Nom de l'employé", 'text', 'name', 'top-title', 'none', 'none')->component('inputs.employees.ke-title-no-label'),
            Input::make('work_phone','Téléphone de travail', 'tel', 'work_phone', 'left', 'none', 'none')->component('inputs.input-2'),
            Input::make('work_email','Email de travail', 'email', 'work_email', 'left', 'none', 'none'),
            Input::make('department','Département', 'select', 'department', 'right', 'none', 'none')->component('inputs.select.employees.department'),
            Input::make('job','Poste', 'text', 'job', 'right', 'none', 'none')->component('inputs.select.employees.job'),
            Input::make('manager','Manager', 'select', 'manager', 'right', 'none', 'none')->component('inputs.select.employees.manager'),
            Input::make('work_address','Adresse', 'select', 'work_address', 'none', 'work_info', 'work_address', '', 'Adresse de travail')->component('inputs.select.company-address'),
            Input::make('work_location','Lieu de travail', 'select', 'workplace', 'none', 'work_info', 'work_address')->component('inputs.select.employees.workplaces'),
            Input::make('working_hours','Heures de travail', 'select', 'working_hours', 'none', 'work_info', 'schedule')->component('inputs.select.employees.schedule'),
            Input::make('timezone','Fuseau horaire', 'select', 'timezone', 'none', 'work_info', 'schedule')->component('inputs.select.timezone'),
            Input::make('role','Rôle', 'select', 'role', 'none', 'work_info', 'planing')->component('inputs.select.role'),
            Input::make('default_role','Rôle par défaut', 'select', 'role', 'none', 'work_info', 'planing')->component('inputs.select.role'),
            //
            Input::make('personal_address','Adresse', 'text', 'personal_address', 'left', 'private_info', 'private_contact')->component('inputs.select.address'),
            Input::make('personal_phone','Téléphone', 'tel', 'personal_phone', 'left', 'private_info', 'private_contact'),
            Input::make('personal_email','Email', 'email', 'personal_email', 'left', 'private_info', 'private_contact'),
            Input::make('bank_account_number','Numéro de compte bancaire', 'text', 'bank_account_number', 'left', 'private_info', 'private_contact')->component('inputs.input-2'),
            // Input::make('private_address','Adresse', 'text', 'address', 'left', 'private_info', 'private_contact')->component('inputs.select.address'),
            //
            Input::make('marital','Etat civil', 'select', 'marital', 'left', 'private_info', 'familly_status')->component('inputs.select.employees.marital_status'),
            Input::make('children_no',"Nombre d'enfants", 'text', 'children_no', 'left', 'private_info', 'familly_status')->component('inputs.input-2'),
            //
            Input::make('contact_name',"Nom du contact", 'text', 'contact_name', 'left', 'private_info', 'emergency'),
            Input::make('contact_phone',"Numéro du contact", 'text', 'contact_phone', 'left', 'private_info', 'emergency')->component('inputs.input-2'),
            //
            Input::make('certificate_level',"Certification", 'text', 'certificate_level', 'left', 'private_info', 'education')->component('inputs.select.employees.certificate_level'),
            Input::make('study_field',"Champ d'étude", 'text', 'study_field', 'left', 'private_info', 'education'),
            Input::make('school_study',"Ecole", 'text', 'school_study', 'left', 'private_info', 'education'),
            //
            Input::make('visa_no',"N° Visa", 'text', 'visa_no', 'left', 'private_info', 'work_permit'),
            Input::make('work_permit_no',"N° Permit de travail", 'text', 'work_permit_no', 'left', 'private_info', 'work_permit')->component('inputs.input-2'),
            Input::make('visa_expiration_date',"Date d'expiration du visa", 'date', 'visa_expiration_date', 'left', 'private_info', 'work_permit')->component('inputs.input-2'),
            Input::make('work_permit_expiration_date',"Date d'expiration du permit de travail", 'date', 'work_permit_expiration_date', 'left', 'private_info', 'work_permit')->component('inputs.input-2'),
            Input::make('work_permit',"Permit de travail", 'text', 'work_permit', 'left', 'private_info', 'work_permit')->component('inputs.select-file.work-permit'),
            Input::make('nationality',"Nationnalité (Pays)", 'text', 'nationality', 'left', 'private_info', 'citizenship')->component('inputs.select.country'),
            Input::make('national_id',"N° CNI / N° NIU", 'text', 'national_id', 'left', 'private_info', 'citizenship', '', "Veuillez entrer le numéro de la carte d'identité (CNI) ou du numéro d'indentification unique (NIU). "),
            Input::make('passport_no',"N° Passeport", 'text', 'passport_no', 'left', 'private_info', 'citizenship'),
            Input::make('gender',"Genre", 'select', 'gender', 'left', 'private_info', 'citizenship')->component('inputs.select.gender'),
            Input::make('birthday',"Date de naissance", 'date', 'birthday', 'left', 'private_info', 'citizenship')->component('inputs.input-2'),
            Input::make('birth_place',"Lieu de naissance", 'text', 'birth_place', 'left', 'private_info', 'citizenship')->component('inputs.input-2'),
            Input::make('birth_country',"Date de naissance", 'text', 'birth_country', 'left', 'private_info', 'citizenship')->component('inputs.input-2'),
            //
            Input::make('employee_type',"Type d'employé", 'select', 'employee_type', 'left', 'hr', 'status')->component('inputs.select.employees.type'),
            Input::make('pin_code',"Code PIN", 'password', 'pin_code', 'left', 'hr', 'control')->component('inputs.pin_code'),
            Input::make('badge_id',"ID Badge", 'text', 'badge_id', 'left', 'hr', 'control')->component('inputs.badge'),

        ];
    }


    public function form() : string
    {
        if($this->updateMode){
            return "update()";
        }else{
            return 'store()';
        }
    }

    public function updateForm() : string
    {
        if($this->updateMode = true){
            return "update()";
        }else{
            return 'store()';
        }
    }

    public function tabs() : array
    {
        return  [
            // make($key, $label)
            // Tabs::make('resume','Résumé'),
            Tabs::make('work_info','Informations Professionnelles')->component('tabs.work_info'),
            Tabs::make('private_info','Informations Personnelles'),
            Tabs::make('hr','Paramètres RH'),
        ];
    }

    public function groups() : array
    {
        return  [
            // make($key, $label, $tabs)
            Group::make('resume','Résumé', 'resume'),
            Group::make('work_address','Localisation', 'work_info')->component('tabs.group.large-simple'),
            Group::make('schedule','Horaires', 'work_info')->component('tabs.group..large-simple'),
            Group::make('planing','Planing', 'work_info')->component('tabs.group..large-simple'),
            //
            Group::make('private_contact','Coordonnées Personnelles', 'private_info'),
            Group::make('familly_status','Contexte Familiale', 'private_info'),
            Group::make('emergency','Urgence', 'private_info'),
            Group::make('education','Education', 'private_info'),
            Group::make('citizenship','Citoyenneté', 'private_info'),
            Group::make('work_permit','Permit de travail', 'private_info'),
            //
            Group::make('status','Statut', 'hr'),
            Group::make('control','Présence/Point de Vente', 'hr'),
        ];
    }

    public function new(){
        return route('employee.create', ['subdomain' => current_company()->domain_name, 'menu' => current_menu()]);
    }

    #[On('create-employee')]
    public function create(){

        // $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->work_email,
            'phone' => $this->work_phone,
            'password' => Hash::make('koverae'),
            'is_active' => 1,
        ]);
        $user->save();

        $employee = Employee::create([
            'user_id' => $user->id,
            'department_id' => $this->department,
            'job_id' => $this->job,
            'manager_id' => $this->manager,
            'work_address' => $this->work_address,
            'workplace_id' => $this->workplace,
            'date_of_hire' => now(),

            'role' => $this->role,
            'default_role' => $this->default_role,

            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'personal_email' => $this->personal_email,
            'personal_phone' => $this->personal_phone,
            'bank_account_id' => $this->bank_account_id,
            // 'languages' => 'fr',

            'certificate_level' => $this->certificate_level,
            'study_field' => $this->study_field,
            'school_study' => $this->school,

            'marital_status' => $this->marital,
            'children_no' => $this->children_no,

            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,

            'nationality' => $this->nationality,
            'national_id' => $this->national_id,
            'passport_no' => $this->passport_no,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'birth_place' => $this->birth_place,
            'birth_country' => $this->birth_country,
            'is_resident' => $this->is_resident,

            'visa_no' => $this->visa_no,
            'work_permit_no' => $this->work_permit_no,
            'visa_expiration_date' => $this->visa_expiration_date,
            'work_permit_expiration_date' => $this->work_permit_expiration_date,

            'type' => $this->employee_type,
            'pin_code' => $this->pin_code,
            'cypher_id' => $this->badge_id,
        ]);
        $employee->save();

        return redirect()->route('employee.show', ['subdomain' => current_company()->domain_name, 'employee' => $employee->id, 'menu' => current_menu()]);
    }

    #[On('update-employee')]
    public function update(){
        $employee = Employee::find($this->employee->id);

        // $this->validate();

        $employee->user->update([
            'name' => $this->name,
            'email' => $this->work_email,
            'phone' => $this->work_phone,
        ]);
        $employee->user->save();

        $employee->update([
            'department_id' => $this->department,
            'job_id' => $this->job,
            'manager_id' => $this->manager,
            'work_address' => $this->work_address,
            'workplace_id' => $this->workplace,
            'date_of_hire' => now(),

            'role' => $this->role,
            'default_role' => $this->default_role,

            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'personal_email' => $this->personal_email,
            'personal_phone' => $this->personal_phone,
            'bank_account_id' => $this->bank_account_id,
            // 'languages' => 'fr',

            'certificate_level' => $this->certificate_level,
            'study_field' => $this->study_field,
            'school_study' => $this->school,

            'marital_status' => $this->marital,
            'children_no' => $this->children_no,

            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,

            'nationality' => $this->nationality,
            'national_id' => $this->national_id,
            'passport_no' => $this->passport_no,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'birth_place' => $this->birth_place,
            'birth_country' => $this->birth_country,
            'is_resident' => $this->is_resident,

            'visa_no' => $this->visa_no,
            'work_permit_no' => $this->work_permit_no,
            'visa_expiration_date' => $this->visa_expiration_date,
            'work_permit_expiration_date' => $this->work_permit_expiration_date,

            'type' => $this->employee_type,
            'pin_code' => $this->pin_code,
            'cypher_id' => $this->badge_id,
        ]);
        $employee->save();

        return redirect()->route('employee.show', ['subdomain' => current_company()->domain_name, 'employee' => $employee->id, 'menu' => current_menu()]);
    }

    public function generateCypher(){

        $employees =  Employee::all();
        $uniqueCypher = null;
        if($this->employee->cypher_id == null){
            // Keep generating a unique cypher until it is not found in the existing employees
            do {
                $uniqueCypher = mt_rand(100000000000, 999999999999);
            } while ($employees->contains('cypher_id', $uniqueCypher));
        }

        $this->employee->update([
            'cypher_id' =>  $uniqueCypher
        ]);
        $this->employee->save();
        $this->badge_id = $uniqueCypher;

    }

    public function showPin(){

        $inputs = $this->inputs();
        // dd(array_keys($inputs));
        $inputs[36]->type = 'text';
    }

}
