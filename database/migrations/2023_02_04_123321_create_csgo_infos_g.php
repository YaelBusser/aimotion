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
        Schema::create('csgo_infos_g_maps_plus_jouees', function (Blueprint $table) {
            $table->id('id_csgo_infos_g_maps_plus_jouees');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_map');
        });
        Schema::create('csgo_infos_g_maps_moins_jouees', function (Blueprint $table) {
            $table->id('id_csgo_infos_g_maps_moins_jouees');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_map');
        });
        Schema::create('csgo_infos_g_style_de_jeu', function (Blueprint $table) {
            $table->id('id_csgo_infos_g_style_de_jeu');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_style_de_jeu');
        });
        Schema::create('csgo_infos_g_rolect', function (Blueprint $table) {
            $table->id('id_csgo_infos_g_rolect');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_rolect');
        });
        Schema::create('csgo_infos_g_rolet', function (Blueprint $table) {
            $table->id('id_csgo_infos_g_rolet');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_rolet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csgo_infos_g');
    }
};
