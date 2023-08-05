<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idUsers');
            $table->string('report_type');
            $table->string('persons');
            $table->string('description')->nullable();
            $table->string('city');
            $table->double('Longitude', 10, 5);
            $table->double('Latitude', 10, 5);
            $table->unsignedBigInteger('idReportState')->default(1);
            $table->timestamps();
            $table->foreign('idUsers')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idReportState')->references('id')->on('report_state')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}
