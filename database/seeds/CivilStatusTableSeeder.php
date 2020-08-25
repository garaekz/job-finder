<?php

use App\CivilStatus;
use Illuminate\Database\Seeder;

class CivilStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
          ['slug' => 'soltero', 'name' => 'Soltero/a'],
          ['slug' => 'casado', 'name' => 'Casado/a'],
          ['slug' => 'divorciado', 'name' => 'Divorciado/a'],
          ['slug' => 'viudo', 'name' => 'Viudo/a'],
          ['slug' => 'union_libre', 'name' => 'Unión libre'],
        ];

        CivilStatus::insert($statuses);
    }
}
