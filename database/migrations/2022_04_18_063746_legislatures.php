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
            $table->date('begin');
            $table->date('end')->nullable()->default(null);
            $table->date('election')->nullable()->default(null);
            $table->string('president')->default('');
            $table->string('vicepresident')->default('');
            $table->string('party')->default('');
            $table->string('government')->default('');
            $table->string('color')->default('');
            $table->string('headofstate')->default('');
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
