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
        Schema::create('brands', function (Blueprint $table) {
            $table->id('brand_id');
            $table->string('brand_name')->unique();
            $table->string('brand_pay_of_line')->nullable();
            $table->string('brand_title')->nullable();
            $table->string('brand_description')->nullable();
            $table->string('brand_official_email')->unique();
            $table->string('brand_official_phone')->unique();
            $table->string('brand_official_address')->nullable();
            $table->string('brand_image')->nullable();
            $table->string('brand_slug')->nullable();
            $table->string('brand_status')->nullable();
            $table->string('brand_creator')->nullable();
            $table->string('brand_editor')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
