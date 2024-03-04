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
        Schema::table('checkouts', function (Blueprint $table) {
            //
            $table->foreignId('discount_id')->nullable()->after('midtrans_booking_code');
            $table->unsignedBigInteger('discount_percentage')->nullable()->after('discount_id');
            $table->unsignedBigInteger('total')->default(0)->after('discount_percentage');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            //
            $table->dropForeign('checkouts_discount_id_foreign');
            $table->dropColumn('discount_id', 'discount_percentage', 'total');
        });
    }
};
