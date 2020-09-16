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
            $table->bigIncrements('id');

            $table->string('setting');
            $table->string('field_value')->nullable();
            $table->string('field_type')->default('text');
            $table->string('validation')->nullable();

//            $table->string('facebook_link')->nullable();
//            $table->string('twitter_link')->nullable();
//            $table->string('google_plus_link')->nullable();
//            $table->string('instagram_link')->nullable();
//            $table->string('linkedin_link')->nullable();
//            $table->string('logo')->nullable();
//            $table->string('algemene_voorwaarden')->nullable();
//            $table->string('cookie_beleid')->nullable();
//            $table->string('privacy_statement')->nullable();
//            $table->string('postcode')->nullable();
//            $table->string('adres')->nullable();
//            $table->string('fax_nummer')->nullable();
//            $table->string('telefoon_nummer')->nullable();
//            $table->string('kvk_nummer')->nullable();
//            $table->string('btw_nummer')->nullable();
//            $table->string('bic_nummer')->nullable();
//            $table->string('rekening_nummer')->nullable();
//            $table->string('bank_naam')->nullable();
//            $table->string('maps_api_key')->nullable();
//            $table->string('google_analytics_api_key')->nullable();
//            $table->string('hotjar_api_key')->nullable();
//            $table->string('facebook_admin_id')->nullable();
//            $table->string('contact_email')->nullable();
//            $table->string('info_email')->nullable();
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
