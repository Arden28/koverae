<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('product_name');
            $table->string('product_reference')->nullable();
            $table->string('image_path')->nullable();

            $table->enum('product_type', ['storable', 'service', 'consumable', 'booking_fee']); //storable: Stock is managed, consumable: Stock isn't managed, service: non physical product
            $table->enum('invoicing_policy', ['ordered', 'delivered', 'prepaid'])->default('ordered'); //ordered: the products ordered by the customer, delivered: the products delivered to the customer

            $table->unsignedBigInteger('uom_id')->nullable();
            $table->unsignedBigInteger('purchase_uom_id')->nullable();
            $table->decimal('product_price', $precision = 12, $scale = 2)->default(0);
            $table->decimal('product_cost', $precision = 12, $scale = 2)->default(0);
            $table->string('product_order_tax')->nullable();
            $table->string('product_internal_reference')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_barcode_symbology')->nullable();
            $table->decimal('product_quantity', $precision = 10, $scale = 2)->default(1);
            $table->string('product_unit')->nullable();
            $table->integer('product_stock_alert')->default(0);
            $table->tinyInteger('product_tax_type')->nullable();
            $table->text('product_description')->nullable();
            $table->text('product_note')->nullable();
            $table->string('product_tag')->nullable();
            // Sale
            $table->string('optional_products')->nullable(); //Cross sale strategy, ex: for computers: waranty, software
            $table->text('sale_description')->nullable();
            // Purchase
            $table->string('suppliers')->nullable();
            $table->string('product_purchase_tax')->nullable();
            $table->enum('control_policy', ['ordered', 'received'])->default('received'); //Ordered: Control bills on ordered qties, received: Control bills on delivered qties
            $table->text('purchase_description')->nullable();
            // Taxes
            $table->text('sale_taxes')->nullable(); // Using text type to store serialized array
            $table->text('purchase_taxes')->nullable(); // Using text type to store serialized array
            $table->json('taxes')->nullable(); //['sale' => [], 'purchase' => [], 'misc' => []]
            // Inventory
                //Logistics
                $table->unsignedBigInteger('responsible_id')->nullable(); //This user will be responsible of the product's purchase order
                $table->string('weight')->nullable();
                $table->string('volume')->nullable();
                $table->string('customer_lead_time')->nullable(); //Delivery lead time, in days. It's the number of days promised to the customer, between the confirmation of the sale order and the delivery
                // Operations
                $table->string('product_routes')->nullable();
                // Traceability
                $table->enum('tracking', ['unique_serial_number', 'lots', 'no_tracking'])->default('no_tracking');
                // Packaging
                //Description
                $table->text('receipt_description')->nullable();
                $table->text('delivery_description')->nullable();
                // Accounting
                $table->unsignedBigInteger('income_account_id')->nullable();
                $table->unsignedBigInteger('expense_account_id')->nullable();
                $table->unsignedBigInteger('price_difference_account_id')->nullable();

            $table->boolean('can_be_sold')->default(true);
            $table->boolean('can_be_purchased')->default(true);
            $table->boolean('can_be_subscribed')->default(false);
            $table->boolean('can_be_rented')->default(false);
            $table->enum('status', ['active', 'inactive', 'archived'])->default('active');

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete();
            $table->foreign('uom_id')->references('id')->on('unit_of_measures')->restrictOnDelete();
            $table->foreign('purchase_uom_id')->references('id')->on('unit_of_measures')->restrictOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
