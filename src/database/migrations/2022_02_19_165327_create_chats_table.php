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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('vendee_id');
            $table->foreign('vendor_id')->references('id')->on('users');
            $table->foreign('vendee_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function (Blueprint $table){
            $table->dropForeign(['vendor_id', 'vendee_id']);
        });
        Schema::dropIfExists('chats');
    }
};
