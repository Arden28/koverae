<?php

namespace Modules\App\Livewire\Modal;

use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Modules\App\Entities\Email\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use App\Mail\Template;
use Illuminate\Support\Facades\Log;
use Modules\Contact\Entities\Contact;

class SendEmailModal extends ModalComponent
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
        return view('app::livewire.modal.send-email-modal', compact('templates'));
    }

    public function addEmail()
    {
        $this->validate([
            'email' => 'required|email|distinct',
        ]);

        if (!in_array($this->email, $this->recipient_emails, true)) {
            $this->recipient_emails[] = $this->email;
        }

        $this->email = ''; // Reset the temporary email input
    }

    public function removeEmail($index)
    {
        if (isset($this->recipient_emails[$index])) {
            unset($this->recipient_emails[$index]);
            $this->recipient_emails = array_values($this->recipient_emails); // Reindex array
        }
    }

    public function sendEmail(){

        // Validate the form fields before sending the email
        $this->validate([
            'recipient_emails' => 'required|array|min:1',
            'recipient_emails.*' => 'email',
            'subject' => 'required|string',
            'content' => 'required|string',
        ]);

        $company = current_company();

        try {

            $mailContent = new Template($this->subject, $this->content, $company);

            // Send email using the Template Mailable class
            Mail::to($this->recipient_emails)
                ->cc('laudbouetoumoussa@koverae.com')
                ->queue($mailContent);

                notify()->success('Your message has been sent successfully');
            $this->closeModal();
        } catch (\Exception $exception) {
            // Handle the exception
            $errorMessage = $exception->getMessage();

            Log::error("Error sending email: {$exception->getMessage()}", [
                'subject' => $this->subject,
                'emails' => $this->recipient_emails,
                'error' => $exception->getMessage()
            ]);

            notify()->error('Error sending email: ' . $errorMessage);

            // Redirect back or to a specific route
            return redirect()->back();
        }

    }

}