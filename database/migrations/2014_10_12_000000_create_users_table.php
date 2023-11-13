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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name');
            $table->string('vendor_shop_name')->nullable();
            $table->string('vendor_shop_slug')->nullable();
            $table->string('vendor_pay_of_line')->nullable();
            $table->string('vendor_short_description')->nullable();
            $table->string('vendor_join')->nullable();
            $table->string('vendor_avg_review')->nullable();
            $table->string('vendor_profile_pic')->nullable();
            $table->string('vendor_status_id')->nullable();
            $table->string('vendor_editor_id')->nullable();
            $table->string('vendor_creator_id')->nullable();
            $table->string('vendor_shop_address')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('slug')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('designation')->nullable();
            $table->text('address')->nullable();
            $table->text('role_id')->nullable();
            $table->text('status_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
