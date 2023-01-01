<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDoctorEspecialidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_doctor_especialidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('especialidad_id');
            $table->foreignId('doctor_id');
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_doctor_especialidades');
    }
}
