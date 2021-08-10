<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('long_app_name');
            $table->string('short_app_name');
            $table->string('app_slogan')->nullable();
            $table->boolean('captcha')->default(0);
            $table->string('datasitekey')->nullable();
            $table->string('recaptcha_secret')->nullable();
            $table->boolean('image_login')->default(1);
            $table->string('path_image_login')->nullable();
            $table->integer('size_image_login')->nullable();
            $table->string('title_login');
            $table->string('layout');
            $table->string('skin');
            $table->string('favicon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
}
