<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('jobs', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('titel')->nullable();
            $table->string('plaats')->nullable();
            $table->string('salaris')->nullable();
            $table->string('korte_beschrijving', 500)->nullable();
            $table->string('vacature', 10000)->nullable();
            $table->string('status')->nullable();
            $table->string('data', 2000)->nullable();
            $table->boolean('live')->default(0);
            $table->timestamps();

            $table->unsignedBigInteger('specialty_id')->nullable();
            $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('set null');

            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });

//        Schema::table('jobs', function($table) {
//            $table->foreignId('employer_id')
//                ->constrained('employers')
//                ->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
