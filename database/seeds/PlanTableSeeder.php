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
        ],
        [
          'name' =>  'Plan Destacado',
          'price' => 240.00,
        ],
        [
          'name' =>  'Plan Plus',
          'price' => 350.00,
        ]
      ];
      \App\Plan::insert($planes);
    }
}
