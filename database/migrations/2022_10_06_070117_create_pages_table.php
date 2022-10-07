<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('about_heading');
            $table->text('about_content');
            $table->integer('about_status');
            $table->string('contact_heading');
            $table->text('contact_location');
            $table->text('contact_email');
            $table->integer('contact_status');
            $table->string('cart_heading');
            $table->integer('cart_status');
            $table->text('room_heading');
            $table->integer('room_status');
            $table->string('checkout_heading');
            $table->integer('checkout_status');
            $table->string('payment_heading');
            $table->string('signup_heading');
            $table->integer('signup_status');
            $table->string('signin_heading');
            $table->integer('signin_status');
            $table->string('forget_password_heading');
            $table->string('reset_password_heading');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
