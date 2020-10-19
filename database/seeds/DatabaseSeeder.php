<?php

use App\Especialidad;
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
        $this->call(EspecialidadTableSeeder::class);
        $this->call(PrestacionTableSeeder::class);
        $this->call(PlanTableSeeder::class);
    }
}
