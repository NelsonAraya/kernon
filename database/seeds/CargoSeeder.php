<?php

use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new App\Cargo();
	    $p->nombre = 'GERENTE';
	    $p->save();

	    $p = new App\Cargo();
	    $p->nombre = 'ADMINISTRATIVO';
	    $p->save();

	    $p = new App\Cargo();
	    $p->nombre = 'JEFE DE PLANTA';
	    $p->save();
    }
}
