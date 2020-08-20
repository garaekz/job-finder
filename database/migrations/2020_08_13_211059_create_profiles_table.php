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
      Schema::create('civil_statuses', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug');
      });

      Schema::create('personal_infos', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->date('birth_date');
        $table->string('genre');
        $table->unsignedBigInteger('civil_status_id')->nullable();

        $table->foreign('civil_status_id')->references('id')->on('civil_statuses')
          ->onUpdate('cascade')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
