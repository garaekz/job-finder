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
          'soltero' => 'Soltero/a',
          'casado' => 'Casado/a',
          'divorciado' => 'Divorciado/a',
          'viudo' => 'Viudo/a',
          'union_libre' => 'Unión libre',
        ];

        foreach ($statuses as $slug => $status) {
          CivilStatus::create([
            'name' => $status,
            'slug' => $slug
          ]);
        }
    }
}
