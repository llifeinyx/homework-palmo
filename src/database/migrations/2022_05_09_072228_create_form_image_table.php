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
        Schema::create('form_image', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('form_id');
            $table->foreignId('image_id');

            $table->foreign('form_id')->references('id')->on('forms');
            $table->foreign('image_id')->references('id')->on('images');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_image', function (Blueprint $table){
            $table->dropForeign(['form_id', 'image_id']);
        });
        Schema::dropIfExists('form_image');
    }
};
