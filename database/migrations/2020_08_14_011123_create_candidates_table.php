<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::disableForeignKeyConstraints();

        Schema::create('candidates', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('voorletters')->nullable();
            $table->string('voornaam')->nullable();
            $table->string('achternaam')->nullable();
            $table->string('voorvoegsel')->nullable();
            $table->string('adres')->nullable();
            $table->string('postcode')->nullable();
            $table->string('plaats')->nullable();
            $table->string('telefoon_prive')->nullable();
            $table->string('telefoon_mobiel')->nullable();
            $table->string('email');
            $table->string('sociaal_networkprofiel')->nullable();
            $table->string('upload_cv')->nullable();
            $table->string('upload_motivatiebrief')->nullable();
            $table->string('profiel_foto')->nullable();
            $table->date('geboortedatum')->nullable();
            $table->string('inleiding', 1000)->nullable();
            $table->string('opmerking_voor_werkgever')->nullable();
            $table->string('rijbewijs')->nullable();
            $table->string('geslacht')->nullable();
            $table->string('geboorteplaats')->nullable();
            $table->string('status')->nullable();
            $table->string('data', 2000)->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
