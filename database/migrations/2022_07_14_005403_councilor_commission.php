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
        Schema::create('commission_councilor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('councilor_id')->constrained('councilors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('commission_id')->constrained('commissions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('commission_councilor');
    }
};
