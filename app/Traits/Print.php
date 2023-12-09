<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade as Pdf;
use App\Models\Contact;
use App\Models\SalesPerson;
use App\Models\Company;

trait Printable
{
    public function printDocument($model, $documentType)
    {
        try {
            $document = $model::findOrFail($this->id);

            if (!$document) {
                throw new \Exception("{$documentType} not found");
            }

            $customer = Contact::findOrFail($document->customer_id);
            $seller = SalesPerson::findOrFail($document->seller_id);
            $company = current_company();

            $pdf = Pdf::loadView("sales::print-{$documentType}", [
                'document' => $document,
                'customer' => $customer,
                'seller' => $seller,
                'company' => $company
            ])->setPaper('a4');

            return response()->streamDownload(function () use ($pdf, $documentType, $document) {
                echo $pdf->output();
            }, "{$documentType} -" . $document->reference . '.pdf');
        } catch (\Exception $e) {
            Log::error("Error generating {$documentType} PDF: " . $e->getMessage());
            return response()->json(['error' => "Unable to generate {$documentType} PDF"], 500);
        }
    }
}
