<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa = Role::create([
            'name' => 'empresa',
            'display_name' => 'Empresa',
            'description' => 'Empresa que postea vacantes laborales',
        ]);

        $aspirante = Role::create([
            'name' => 'aspirante',
            'display_name' => 'Aspirante',
            'description' => 'Aspirantes que buscan empelo y suben CV\'s',
        ]);
    }
}
