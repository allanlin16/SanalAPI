<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('buildings', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned();

            $table->foreign('client_id')->references('id')->on('clients');
        });

        Schema::table('extinguishers', function (Blueprint $table) {
            $table->bigInteger('building_id')->unsigned();

            $table->foreign('building_id')->references('id')->on('buildings');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function ($table) {
            $table->dropForeign('clients_user_id_foreign');
            $table->dropColumn(['user_id']);
        });

        Schema::table('buildings', function ($table) {
            $table->dropForeign('buildings_client_id_foreign');
            $table->dropColumn(['client_id']);
        });

        Schema::table('extinguishers', function ($table) {
            $table->dropForeign('extinguishers_building_id_foreign');
            $table->dropColumn(['building_id']);
        });
    }
}
