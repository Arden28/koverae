<?php

namespace App\Livewire\Modal\Email;

use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Modules\App\Entities\Email\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use App\Mail\Template;
use Illuminate\Support\Facades\Log;
use Modules\Contact\Entities\Contact;

class SendByMail extends ModalComponent
{
    use WithFileUploads;
    public EmailTemplate $template;

    public $model;

    public $email;
    public $recipient_emails =[];

    public $subject, $content, $template_id;

    public $contact;
    public $file;


    public function mount($template, $model){
        $this->model = $model;
        $this->template= $template;
        $this->recipient_emails = explode(',', $template->recipient_emails);
        $this->subject = str_replace(['{company_name}', '{reference}'], ['Banéo', $model['reference'] ], $template->subject);
        $this->content = str_replace(['{total_amount}', '{reference}', '{sender}'], [format_currency($model['total_amount']), $model['reference'], 'Arden BOUET'], $template->content);
        $this->template_id = $template->id;
        $this->contact = Contact::find($model['customer_id']);

        $this->recipient_emails[] = $this->contact->email;
    }

    public function render()
    {
        $templates = EmailTemplate::isCompany(current_company()->id)->get();
        return view('livewire.modal.email.send-by-mail', compact('templates'));
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public function updatedEmail($value){
        $this->addEmail();
    }

    public function addEmail()
    {
        $this->validate([
            'email' => ['required', 'email', Rule::notIn($this->recipient_emails)],
        ]);

        // Validate email format if needed
        $this->recipient_emails[] = $this->email;
        $this->email = ''; // Clear the input field after adding an email
    }

    public function removeEmail($index)
    {
        unset($this->recipient_emails[$index]);
        $this->recipient_emails = array_values($this->recipient_emails);
    }

    public function sendEmail(){

        // Validate the form fields before sending the email
        $this->validate([
            'recipient_emails' => 'required|array|min:1',
            'subject' => 'required',
            'content' => 'required',
        ]);
        $company = current_company();

        try {
            // Send email using the Template Mailable class
            Mail::to($this->recipient_emails)
                ->cc('laudbouetoumoussa@koverae.com')
                ->send(new Template($this->subject, $this->content, $company));

            $this->closeModal();
        } catch (\Exception $exception) {
            // Handle the exception
            $errorMessage = $exception->getMessage();

            Log::error('Error sending email: ' . $exception->getMessage());

            notify()->error('Error sending email: ' . $errorMessage);

            // Redirect back or to a specific route
            return redirect()->back();
        }

    }
}
