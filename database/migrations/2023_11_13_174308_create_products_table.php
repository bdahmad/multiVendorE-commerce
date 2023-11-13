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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('brand_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->integer('supplier_id')->nullable();

            $table->string('product_quantity_type')->nullable();
            $table->string('product_type')->nullable();
            $table->string('product_quality_type')->nullable();

            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_code');
            $table->string('product_barcode')->nullable();
            $table->string('product_quantity');

            $table->string('product_tags')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_weight')->nullable();
            $table->string('product_sku')->nullable();
            $table->string('product_dimensions')->nullable();
            $table->string('product_materials')->nullable();

            $table->string('product_buy_price');
            $table->string('product_sel_price');
            $table->string('product_discount_price')->nullable();
            $table->string('product_event_price')->nullable();

            $table->string('product_short_description');
            $table->string('product_long_description');
            $table->string('product_thumbnail');
            $table->string('product_avg_review')->nullable();
            $table->string('product_note')->nullable();

            $table->string('product_hot_deals')->nullable();
            $table->string('product_featured')->nullable();
            $table->string('product_special_offer')->nullable();
            $table->string('product_special_deals')->nullable();

            $table->integer('product_status_id');
            $table->integer('product_creator_id')->nullable();
            $table->integer('product_editor_id');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
