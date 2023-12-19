<?php

namespace Modules\Sales\Livewire\Form;

use Livewire\Component;
use App\Traits\Form\Button\ActionBarButton as ActionBarButtonTrait;
use Modules\Sales\Entities\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Contact\Entities\Contact;
use Modules\Sales\Entities\SalesPerson;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SaleForm extends Component
{


    // Print sale
    public function print(){
        try {
            // $sale = sale::find(38);

            if (!$this->sale) {
                throw new \Exception('sale not found');
            }

            $sale = Sale::findOrFail($this->sale->id);

            $customer = Contact::findOrFail($sale->customer_id);
            $seller = SalesPerson::findOrFail($sale->seller_id);
            $company = current_company();

            $pdf = Pdf::loadView('sales::print-sale', [
                'sale' => $sale,
                'customer' => $customer,
                'seller' => $seller,
                'company' => $company
            ])->setPaper('a4');

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output(); // Echo download contents directly...
            }, 'Devis -' . $sale->reference . '.pdf');


            // return response($utf8Output)->download('sale-' . $sale->reference . '.pdf');
        } catch (\Exception $e) {
            Log::error('Error generating sale PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to generate PDF'], 500);
        }
    }

}
