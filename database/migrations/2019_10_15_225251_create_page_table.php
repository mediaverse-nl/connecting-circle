<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('titel')->nullable();
            $table->longText('meta_titel')->nullable();
            $table->longText('meta_beschrijving')->nullable();
            $table->longText('meta_titel_twitter')->nullable();
            $table->longText('meta_beschrijving_twitter')->nullable();
            $table->longText('meta_image_twitter')->nullable();
            $table->longText('meta_titel_open_graph')->nullable();
            $table->longText('meta_beschrijving_open_graph')->nullable();
            $table->longText('meta_image_open_graph')->nullable();
            $table->longText('options')->nullable();
            $table->boolean('nofollow')->nullable()->default(1);
            $table->boolean('noindex')->nullable()->default(1);
            $table->boolean('in_sitemap')->nullable()->default(null);
            $table->boolean('in_menu')->nullable()->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page');
    }
}
