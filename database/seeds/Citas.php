<?php

use Illuminate\Database\Seeder;

class Citas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citas')->delete();
        DB::table('citas')->insert([
            'diaConsulta'       => 'Lunes',
            'horaConsulta'      => '10:00 am - 11:00 am',
            'nombrePaciente'    => 'Vinicio',
            'apellidoPaciente'  => 'Martínez',
            'fechaNacimiento'   => '1998-11-30'
        ]);
    }
}
