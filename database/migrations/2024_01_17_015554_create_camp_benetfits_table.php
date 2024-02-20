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
        Schema::create('camp_benetfits', function (Blueprint $table) {
            $table->id();
            // 1 Methode
            // $table->unsignedBigInteger('camp_id');
            // $table->foreign('camp_id')->references('id')->on('camps')->cascadeOnDelete();
            //  2 Methode dengan syarat harus sama dengan table yang di relasikan
            $table->foreignId('camp_id')->constrained();
            $table->string('name', 150);
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
        Schema::dropIfExists('camp_benetfits');
    }
};
