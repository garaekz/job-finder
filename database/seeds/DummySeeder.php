<?php

use App\PerfilEmpresa;
use App\Prestacion;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::where('email', 'test@empresa.io')->first();
      if (!$user) {
        $user = User::create([
          'first_name' => 'David',
          'last_name' => 'Garay',
          'email' =>'test@empresa.io',
          'password' => bcrypt('test123'),
        ]);
        $data = [
          'logo' => '/images/fav.png',
          'nombre_comercial' => 'Empresa de prueba',
          'descripcion' => 'Es una empresa de prueba para poder verificar nuevos features relacionados con los usuarios del tipo empresa',
          'telefono' => '(664) 555-1234',
          'estado_id' => 2,
          'municipio_id' => 15,
          'cp' => "22100",
          'web' => 'www.empresa.io',
          'empleados' => 250,
          'user_id' => $user->id
        ];
        $empresa = Role::where('name', 'empresa')->first();
        $user->attachRole($empresa);
        $perfil = new PerfilEmpresa($data);
        $user->perfil_empresa()->save($perfil);
      }

      factory(App\Vacante::class, 90)
      ->create(['user_id' => $user->id])
      ->each(function ($vacante)
      {
        $faker = Faker\Factory::create();
        $prestaciones = Prestacion::inRandomOrder()->limit($faker->numberBetween(1, 9))->get('id')->pluck('id')->toArray();
        $vacante->prestaciones()->sync($prestaciones);
      });
    }
}
