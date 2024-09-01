<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('subby.tables.plans'), function (Blueprint $table) {
            // Columns
            $table->increments('id');
            $table->string('tag')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->decimal('price')->default('0.00');
            $table->decimal('signup_fee')->default('0.00');
            $table->string('currency', 3);
            $table->unsignedSmallInteger('trial_period')->default(0);
            $table->string('trial_interval')->default('day');
            $table->string('trial_mode')->default('outside');
            $table->unsignedSmallInteger('grace_period')->default(0);
            $table->string('grace_interval')->default('day');
            $table->unsignedSmallInteger('invoice_period')->default(1);
            $table->string('invoice_interval')->default('month');
            $table->unsignedMediumInteger('tier')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create(config('subby.tables.plan_features'), function (Blueprint $table) {
            // Columns
            $table->increments('id');
            $table->string('tag');
            $table->unsignedInteger('plan_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('value');
            $table->unsignedSmallInteger('resettable_period')->default(0);
            $table->string('resettable_interval')->default('month');
            $table->unsignedMediumInteger('sort_order')->default(0);
            $table->timestamps();

            // Indexes
            $table->unique(['tag', 'plan_id']);
            $table->foreign('plan_id')->references('id')->on(config('subby.tables.plans'))
                ->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::create(config('subby.tables.plan_subscriptions'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
            $table->morphs('subscriber');
            $table->unsignedInteger('plan_id')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price')->default('0.00');
            $table->string('currency', 3);
            $table->unsignedSmallInteger('trial_period')->default(0);
            $table->string('trial_interval')->default('day');
            $table->unsignedSmallInteger('grace_period')->default(0);
            $table->string('grace_interval')->default('day');
            $table->unsignedSmallInteger('invoice_period')->default(1);
            $table->string('invoice_interval')->default('month');
            $table->string('payment_method')->nullable()->default('free');
            $table->unsignedMediumInteger('tier')->default(0);
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('cancels_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamps();

            // Indexes
            $table->unique(['tag', 'subscriber_id', 'subscriber_type'], 'unique_plan_subscription');
            $table->foreign('plan_id')->references('id')->on(config('subby.tables.plans'))
                ->onDelete('set null')->onUpdate('cascade');
        });
        
        Schema::create(config('subby.tables.plan_subscription_features'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plan_subscription_id');
            $table->unsignedInteger('plan_feature_id')->nullable();
            $table->string('tag');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('value');
            $table->unsignedSmallInteger('resettable_period')->default(0);
            $table->string('resettable_interval')->default('month');
            $table->unsignedMediumInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['plan_subscription_id', 'tag']);

            $table->foreign('plan_subscription_id')->references('id')->on(config('subby.tables.plan_subscriptions'))
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('plan_feature_id')->references('id')->on(config('subby.tables.plan_features'))
                ->onDelete('set null')->onUpdate('cascade');
        });
        
        Schema::create(config('subby.tables.plan_subscription_usage'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plan_subscription_feature_id')->unique();
            $table->unsignedInteger('used');
            $table->timestamp('valid_until')->nullable();
            $table->timestamps();

            $table->foreign('plan_subscription_feature_id')->references('id')->on(config('subby.tables.plan_subscription_features'))
                ->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::create(config('subby.tables.plan_subscription_schedules'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscription_id');
            $table->morphs('scheduleable', 'scheduleable_index');
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('failed_at')->nullable();
            $table->timestamp('succeeded_at')->nullable();

            $table->unique(['subscription_id', 'scheduleable_type', 'scheduleable_id', 'scheduled_at'], 'unique_plan_subscription_keys');

            $table->foreign('subscription_id', 'plan_subscription_fk')->references('id')->on(config('subby.tables.plan_subscriptions'))->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::create(config('subby.tables.plan_combinations'), function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('plan_id')->nullable();
            $table->string('tag')->unique();
            $table->char('country', 3);
            $table->char('currency', 3);
            $table->decimal('price')->default('0.00');
            $table->decimal('signup_fee')->default('0.00');
            $table->unsignedSmallInteger('invoice_period')->default(1);
            $table->string('invoice_interval')->default('month');
            $table->timestamps();

            $table->unique(['plan_id','country', 'currency', 'invoice_period', 'invoice_interval'], 'unique_plan_combination');

            $table->foreign('plan_id', 'plan_id_fk')->references('id')->on(config('subby.tables.plans'))->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('subby.tables.plans'));
        Schema::dropIfExists(config('subby.tables.plan_features'));
        Schema::dropIfExists(config('subby.tables.plan_subscriptions'));
        Schema::dropIfExists(config('subby.tables.plan_subscription_features'));
        Schema::dropIfExists(config('subby.tables.plan_subscription_usage'));
        Schema::dropIfExists(config('subby.tables.plan_subscription_schedules'));
        Schema::dropIfExists(config('subby.tables.plan_combinations'));
    }
};
