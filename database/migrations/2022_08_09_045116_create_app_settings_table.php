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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default(env('APP_NAME'));
            $table->string('app_logo')->nullable();
            $table->string('app_url')->default(env('APP_URL'));
            $table->string('mail_host')->default(env('MAIL_HOST'));
            $table->string('mail_port')->default(env('MAIL_PORT'));
            $table->string('mail_username')->default(env('MAIL_USERNAME'));
            $table->string('mail_password')->default(env('MAIL_PASSWORD'));
            $table->string('mail_encryption')->default(env('MAIL_ENCRYPTION'));
            $table->string('mail_from_address')->default(env('MAIL_FROM_ADDRESS'));
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
        Schema::dropIfExists('app_settings');
    }
};
