<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->unsignedBigInteger('price_list_id')->nullable();
            $table->unsignedBigInteger('pos_id')->nullable();
            $table->string('name');
            $table->enum('type', ['coupon', 'loyalty_card', 'promotion', 'discount_code', 'buy_x_get_y', 'next_order_coupon'])->default('coupon')->comment("Coupon: Générez et partagez des codes de réduction manuellement. Il peut être utilisé dans le commerce électronique, dans les points de vente ou dans les commandes régulières pour réclamer la récompense. Vous pouvez définir des contraintes sur son utilisation via une règle conditionnelle; Loyalty Card: Lorsque les clients passent une commande, ils accumulent des points qu’ils peuvent échanger contre des récompenses sur la commande en cours ou sur une future; Promotion: Mettre en place des règles conditionnelles sur la commande qui donneront accès aux récompenses aux clients; Discount codes: Définissez des codes de réduction sur des règles conditionnelles, puis partagez-les avec vos clients pour obtenir des récompenses; Buy X get Y: Accordez 1 crédit pour chaque article acheté puis récompensez le client avec Y articles en échange de X crédits; Next order: Générez des achats répétés en envoyant un code promo unique à usage unique pour le prochain achat lorsqu'un client achète quelque chose dans votre magasin.");
            $table->string('point_uom')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('has_limit_usage')->default(false);
            $table->integer('limit_usage')->default(0);
            $table->string('avaible_on')->nullable();

            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('price_list_id')->references('id')->on('price_lists')->cascadeOnDelete();
            // $table->foreign('pos_id')->references('id')->on('pos')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_programs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
