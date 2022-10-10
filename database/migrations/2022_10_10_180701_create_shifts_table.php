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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->date('Date');
            $table->string('Employee');
            $table->string('Employer');
            $table->integer('Hours');
            $table->string("Rate_per_Hour");
            $table->string('Taxable');
            $table->string('Status');
            $table->string("Shift_Type");
            $table->dateTime("Paid_At")->nullable();
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
        Schema::dropIfExists('shifts');
    }
};
