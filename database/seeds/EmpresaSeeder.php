<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new App\Empresa();
	    $p->nombre = 'KOMATSU';
	    $p->save();

	    $p = new App\Empresa();
	    $p->nombre = 'EMPRESA 1';
	    $p->save();
	    
	    $p = new App\Empresa();
	    $p->nombre = 'EMPRESA 2';
	    $p->save();
    }
}
