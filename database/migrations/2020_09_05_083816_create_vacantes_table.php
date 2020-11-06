<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones', function (Blueprint $table) {
          $table->id();
          $table->string('name');
        });
        Schema::create('compras', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id');
          $table->unsignedBigInteger('plan_id');
          $table->decimal('price', 10, 2);
          $table->dateTime('start_at')->nullable();
          $table->dateTime('finish_at')->nullable();
          $table->timestamps();
      });
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compra_id');
            $table->string('empresa');
            $table->string('puesto');
            $table->string('jornada');
            $table->longText('descripcion');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('experiencia');
            $table->string('otros_requisitos')->nullable();
            $table->string('sueldo');
            $table->unsignedBigInteger('estado_id');
            $table->string('otras_prestaciones')->nullable();
            $table->text('actividades')->nullable();
            $table->text('comentario')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_urgente')->default(false);
            $table->boolean('is_active')->default(true);
            $table->dateTime('finish_at');
            $table->timestamps();

            $table->foreign('compra_id')->references('id')->on('compras')
              ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_id')->references('id')->on('estados')
              ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
              ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('prestacion_vacante', function (Blueprint $table) {
          $table->unsignedBigInteger('prestacion_id');
          $table->unsignedBigInteger('vacante_id');

          $table->foreign('prestacion_id')->references('id')->on('prestaciones')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('vacante_id')->references('id')->on('vacantes')
              ->onUpdate('cascade')->onDelete('cascade');

          $table->primary(['prestacion_id', 'vacante_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('prestacion_vacante');
      Schema::dropIfExists('vacantes');
      Schema::dropIfExists('compras');
      Schema::dropIfExists('prestaciones');
    }
}
