<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('whatsapp');
            $table->string('whatsapp_link');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('pintorest_link');
            $table->string('messenger_link');
            $table->text('about');
            $table->text('terms_condition');
            $table->text('privacy_policy');
            $table->text('refund_policy');
            $table->text('google_map_link');
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
        Schema::dropIfExists('settings');
    }
}
