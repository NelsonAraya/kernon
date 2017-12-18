<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = App\Role::where('nombre', 'registro')->first();
		$role2 = App\Role::where('nombre', 'evaluacion')->first();
		$role4 = App\Role::where('nombre', 'informe')->first();
		$role3 = App\Role::where('nombre', 'asistencia')->first();

        $p = new App\Usuario();
	    $p->id=17096233;
	    $p->dv='8';
	    $p->nombres=strtolower('Nelson Antonio');
	    $p->apellidop=strtolower('Araya');
	    $p->apellidom=strtolower('Vacca');
	    $p->fecha_nacimiento='1989-05-30';
	    $p->telefono=123456;
	    $p->direccion='Direccion del usuario';
	    $p->sexo='M';
	    $p->email='a@b.cl';
	    $p->password= bcrypt('kernon');
	    $p->empresa()->associate(App\Empresa::find(1));
	    $p->cargo()->associate(App\Cargo::find(1));

	    $p->roles()->attach($role1);
	    $p->roles()->attach($role2);
	    $p->roles()->attach($role3);
	    $p->roles()->attach($role4);
	   	$p->save();
    }
}
