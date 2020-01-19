<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtinguishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extinguishers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('extinguisher_make');
            $table->string('extinguisher_serialnumber');
            $table->string('extinguisher_barcodenumber');
            $table->string('extinguisher_locationarea');
            $table->string('extinguisher_locationdescription');
            $table->string('extinguisher_type');
            $table->string('extinguisher_rating');
            $table->float('extinguisher_size');
            $table->date('extinguisher_manufacturedate');
            $table->date('extinguisher_htestdate');
            $table->date('extinguisher_servicedate');
            $table->date('extinguisher_nextservicedate');
            $table->string('extinguisher_comment');
            $table->string('extinguisher_status');
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
        Schema::dropIfExists('extinguishers');
    }
}
