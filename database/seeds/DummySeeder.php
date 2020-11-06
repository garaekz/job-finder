<?php

use App\Compra;
use App\PerfilEmpresa;
use App\Prestacion;
use App\Role;
use App\User;
use Carbon\Carbon;
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
          'rfc' => 'EMPSA220110FE',
          'razon_social' => 'Empresa SA de CV',
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

      $currentTimestamp = Carbon::now();

      $compra = Compra::create([
        'user_id' => $user->id,
        'plan_id' => 3,
        'price' => 2300,
        'start_at' => $currentTimestamp->format('Y-m-d H:i:s'),
        'finish_at' => $currentTimestamp->addYears(100)->format('Y-m-d H:i:s')
      ]);

      factory(App\Vacante::class, 90)
      ->create(['user_id' => $user->id, 'compra_id' => $compra->id])
      ->each(function ($vacante)
      {
        $faker = Faker\Factory::create();
        $prestaciones = Prestacion::inRandomOrder()->limit($faker->numberBetween(1, 9))->get('id')->pluck('id')->toArray();
        $vacante->prestaciones()->sync($prestaciones);
      });
    }
}
