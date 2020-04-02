<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditExtinguisherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('extinguishers', function (Blueprint $table) {
            $table->dropColumn('extinguisher_size');
            $table->string('extinguisher_photourl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extinguishers', function ($table) {
            $table->float('extinguisher_size');
            $table->dropColumn('extinguisher_photourl');
        });
    }
}
