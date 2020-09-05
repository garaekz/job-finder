<?php

use Illuminate\Database\Seeder;

class PrestacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $prestaciones = [
        ['name' => 'Comisiones'],
        ['name' => 'Prestaciones de Ley'],
        ['name' => 'Desarrollo y crecimiento dentro del negocio'],
        ['name' => 'Talleres, cursos y Actualización'],
        ['name' => 'Buen ambiente laboral'],
        ['name' => 'Vales de despensa'],
        ['name' => 'Bono de puntualidad y asistencia'],
        ['name' => 'Caja de ahorro'],
        ['name' => 'Horario flexible']
      ];
      \App\Prestacion::insert($prestaciones);
    }
}
