<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(CivilStatusTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(MunicipioTableSeeder::class);
    }
}
