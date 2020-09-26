<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('estados', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('abbrev');
        $table->string('country');
    });

      Schema::create('municipios', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('estado_id');
        $table->integer('number');

        $table->foreign('estado_id')->references('id')->on('estados');
      });

      Schema::create('civil_statuses', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug');
      });

      Schema::create('especialidads', function (Blueprint $table) {
        $table->id();
        $table->string('name');
      });

      Schema::create('formacions', function (Blueprint $table) {
        $table->id();
        $table->string('lugar');
        $table->date('inicio');
        $table->date('termino');
        $table->timestamps();
      });

      Schema::create('experiencia_laborals', function (Blueprint $table) {
        $table->id();
        $table->string('empresa');
        $table->date('inicio');
        $table->date('termino');
        $table->integer('sueldo');
        $table->date('puesto');
        $table->text('desc_actividades');
        $table->text('motivo_separacion');
        $table->timestamps();
      });

      Schema::create('perfil_aspirantes', function (Blueprint $table) {
        $table->id();
        $table->string('foto')->nullable();
        $table->date('fecha_nacimiento')->nullable();
        $table->string('descripcion')->nullable();
        $table->string('telefono')->nullable();
        $table->unsignedBigInteger('estado_id')->nullable();
        $table->unsignedBigInteger('municipio_id')->nullable();
        $table->string('cp')->nullable();
        $table->string('nacionalidad')->nullable();
        $table->unsignedBigInteger('especialidad_id')->nullable();
        $table->unsignedBigInteger('civil_status_id')->nullable();
        $table->string('habilidades')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->timestamps();

        $table->foreign('estado_id')->references('id')->on('estados')
          ->onUpdate('cascade')->onDelete('set null');
        $table->foreign('municipio_id')->references('id')->on('municipios')
          ->onUpdate('cascade')->onDelete('set null');
        $table->foreign('especialidad_id')->references('id')->on('especialidads')
          ->onUpdate('cascade')->onDelete('set null');
        $table->foreign('civil_status_id')->references('id')->on('civil_statuses')
          ->onUpdate('cascade')->onDelete('set null');
        $table->foreign('user_id')->references('id')->on('users')
          ->onUpdate('cascade')->onDelete('cascade');
      });

      Schema::create('portafolios', function (Blueprint $table) {
        $table->id();
        $table->string('imagen');
        $table->unsignedBigInteger('perfil_aspirante_id');
        $table->timestamps();

        $table->foreign('perfil_aspirante_id')->references('id')->on('perfil_aspirantes');
      });

      Schema::create('workbooks', function (Blueprint $table) {
        $table->id();
        $table->string('file');
        $table->unsignedBigInteger('perfil_aspirante_id');
        $table->timestamps();

        $table->foreign('perfil_aspirante_id')->references('id')->on('perfil_aspirantes');
      });

      Schema::create('perfil_empresas', function (Blueprint $table) {
        $table->id();
        $table->string('logo')->nullable();
        $table->string('nombre_comercial');
        $table->string('rfc');
        $table->string('razon_social');
        $table->text('descripcion')->nullable();
        $table->string('telefono')->nullable();
        $table->unsignedBigInteger('estado_id')->nullable();
        $table->unsignedBigInteger('municipio_id')->nullable();
        $table->string('cp')->nullable();
        $table->string('web')->nullable();
        $table->integer('empleados')->nullable();
        $table->unsignedBigInteger('user_id');
        $table->timestamps();

        $table->foreign('estado_id')->references('id')->on('estados')
          ->onUpdate('cascade')->onDelete('set null');
        $table->foreign('municipio_id')->references('id')->on('municipios')
          ->onUpdate('cascade')->onDelete('set null');
        $table->foreign('user_id')->references('id')->on('users')
          ->onUpdate('cascade')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('perfil_empresas');
      Schema::dropIfExists('workbooks');
      Schema::dropIfExists('portafolios');
      Schema::dropIfExists('perfil_aspirantes');
      Schema::dropIfExists('experiencia_laborals');
      Schema::dropIfExists('formacions');
      Schema::dropIfExists('especialidads');
      Schema::dropIfExists('civil_statuses');
      Schema::dropIfExists('municipios');
      Schema::dropIfExists('estados');
    }
}
