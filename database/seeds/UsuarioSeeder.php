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
        $p = new App\Usuario();
	    $p->run=17096233;
	    $p->dv='8';
	    $p->nombres='Nelson Antonio';
	    $p->apellidop='Araya';
	    $p->apellidom='Vacca';
	    $p->fecha_nacimiento='1989-05-30';
	    $p->telefono=123456;
	    $p->direccion='Direccion del usuario';
	    $p->sexo='M';
	    $p->email='a@b.cl';
	    $p->password= bcrypt('kernon');
	    $p1->empresa()->associate(App\Empresa::find(1));
	    $p1->cargo()->associate(App\Cargo::find(1));
	    $p->save();
    }
}
