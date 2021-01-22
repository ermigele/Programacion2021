<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100)->unique();
            $table->unsignedInteger('presupuesto');
            $table->unsignedInteger('centro_id');
            $table->timestamps();

            $table->foreign('centro_id')->references('id')->on('centros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_departamento');
    }
}
