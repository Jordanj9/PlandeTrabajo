<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlandedesarrolloasignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plandedesarrolloasignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->bigInteger('plandeasignatura_id')->unsigned();
            $table->foreign('plandeasignatura_id')->references('id')->on('plandeasignaturas')->onDelete('cascade');
            $table->bigInteger('semana_id')->unsigned();
            $table->foreign('semana_id')->references('id')->on('semanas')->onDelete('cascade');
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
        Schema::dropIfExists('plandedesarrolloasignaturas');
    }
}
