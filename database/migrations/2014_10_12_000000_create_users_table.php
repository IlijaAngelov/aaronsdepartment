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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Date');
            $table->string('Employee');
            $table->string('Employer');
            $table->string('Hours');
            $table->string("Rate_per_Hour")->nullable();
            $table->string('Taxable');
            $table->string('Status');
            $table->string("Shift_Type")->nullable();
            $table->string("Paid_At")->nullable();
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
        Schema::dropIfExists('users');
    }
};
