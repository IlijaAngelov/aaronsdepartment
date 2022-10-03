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
        Schema::create('import_csv_data', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('employee');
            $table->string('employer');
            $table->integer('hours');
            $table->float('rate_per_hour');
            $table->boolean('taxable');
            $table->string('status');
            $table->string('shift_type');
            $table->time('paid_at');
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
        Schema::dropIfExists('import_csv_data');
    }
};
