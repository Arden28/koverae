<?php

namespace App\Livewire\Modal\Email;

use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;
use Modules\App\Entities\Email\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use App\Mail\Template;

class SendByMail extends ModalComponent
{
    public EmailTemplate $template;

    public $model;

    public $email;
    public $recipient_emails =[];

    public $subject, $content, $template_id;

    public function mount($template, $model){
        $this->model = $model;
        $this->template= $template;
        $this->recipient_emails = explode(',', $template->recipient_emails);
        $this->subject = str_replace(['{company_name}', '{quotation_reference}'], ['Banéo', $model['reference'] ], $template->subject);
        $this->content = str_replace(['{total_amount}', '{quotation_reference}', '{sender}'], [format_currency($model['total_amount']), $model['reference'], 'Arden BOUET'], $template->content);
        $this->template_id = $template->id;
    }

    public function render()
    {
        $templates = EmailTemplate::all();
        return view('livewire.modal.email.send-by-mail', compact('templates'));
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }


    public function addEmail()
    {
        $this->validate([
            'email' => ['required', 'email', Rule::notIn($this->recipientEmails)],
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

        // Send email using the Template Mailable class
        Mail::to($this->recipient_emails)
            ->cc('laudbouetoumoussa@koverae.com')
            ->send(new Template($this->subject, $this->content, $company));

        $this->closeModal();
    }
}
