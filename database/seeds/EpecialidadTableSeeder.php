<?php

use Illuminate\Database\Seeder;

class EpecialidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $especialidades = [
        ['name' => 'Floristería en general'],
        ['name' => 'Ramos de Novia, XV`S años'],
        ['name' => 'Arreglos Florales'],
        ['name' => 'Eventos Sociales y empresariales'],
        ['name' => 'Arreglos Fúnebres'],
        ['name' => 'Ikebana'],
        ['name' => 'Decoración de Templos/Iglesias']
      ];

      \App\Especialidad::insert($especialidades);
    }
}
