<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vacante;
use Faker\Generator as Faker;

$factory->define(Vacante::class, function (Faker $faker) {
    return [
        'empresa' => $faker->company,
        'puesto'  => $faker->jobTitle,
        'jornada'  => $faker->randomElement(['Tiempo completo', 'Medio tiempo', 'Fin de semana', 'Tiempo completo, nocturno', 'Medio tiempo, nocturno', 'Fin de semana, nocturno']),
        'descripcion' => $faker->randomHtml(4,10),
        'edad' => $faker->numberBetween(18, 65),
        'sexo' => $faker->numberBetween(1, 2) == 1 ? 'Hombre':'Mujer',
        'experiencia' => $faker->numberBetween(1, 5).' años',
        'sueldo' => $faker->randomElement([3000, 5000, 10000, 1500, 2500, 4500]),
        'estado_id' => $faker->numberBetween(1, 32),
        'comentario' => $faker->paragraph(8, true),
        'telefono' => $faker->phoneNumber,
        'email' => $faker->email,
    ];
});
