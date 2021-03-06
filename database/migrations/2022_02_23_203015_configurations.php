<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Electronic Voting System');
            $table->string('logo')->default('img/apli/EuropeanUnion.png');
            $table->integer('seats')->default(100);
            $table->boolean('allowElection')->default(false);
            $table->boolean('allowResult')->default(true);
            $table->boolean('allowPactometer')->default(true);
            $table->boolean('allowLegislatures')->default(true);
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('supervisor');//administrator - manager - supervisor - user
            $table->string('lastname')->nullable();
            $table->string('icon')->default('img/users/user-example.png');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
};
