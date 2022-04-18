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
        Schema::create('legislatures', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->date('date_election');
            $table->date('date_begin');
            $table->date('date_end')->nullable(true);
            $table->string('President')->default('');
            $table->string('Party')->default('');
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
        Schema::dropIfExists('legislatures');
    }
};
