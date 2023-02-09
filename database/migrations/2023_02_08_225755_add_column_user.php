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
        Schema::table('users', function (Blueprint $table) {
            $table->string('csgo_casque')->nullable();
            $table->string('csgo_clavier')->nullable();
            $table->string('csgo_souris')->nullable();
            $table->bigInteger('csgo_DPI')->nullable();
            $table->float('csgo_sensi')->nullable();
            $table->string('csgo_ecran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
