<?php

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
        $role = new App\Role();
		$role->nombre ='registro';
		$role->descripcion = 'Modulo de Registros';
		$role->save();
		
        $role = new App\Role();
		$role->nombre ='informe';
		$role->descripcion = 'Modulo de Informes';
		$role->save();

		$role = new App\Role();
		$role->nombre ='evaluacion';
		$role->descripcion = 'Modulo de Evaluaciones';
		$role->save();

		$role = new App\Role();
		$role->nombre ='asistencia';
		$role->descripcion = 'Modulo de Asistencia';
		$role->save();
    }
}
