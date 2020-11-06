<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $planes = [
        [
          'name' =>  'Plan Gratuito',
          'price' => 0,
          'publicaciones_normales' => 0,
          'publicaciones_urgentes' => 0
        ],
        [
          'name' =>  'Plan Destacado Mensual',
          'price' => 240.00,
          'publicaciones_normales' => 4,
          'publicaciones_urgentes' => 0
        ],
        [
          'name' =>  'Plan Plus Anual',
          'price' => 350.00,
          'publicaciones_normales' => 4,
          'publicaciones_urgentes' => 2
        ],
        [
          'name' =>  'Plan Destacado Anual',
          'price' => 2300.00,
          'publicaciones_normales' => 48,
          'publicaciones_urgentes' => 0
        ],
        [
          'name' =>  'Plan Plus Anual',
          'price' => 3696.00,
          'publicaciones_normales' => 48,
          'publicaciones_urgentes' => 24
        ]
      ];
      \App\Plan::insert($planes);
    }
}
