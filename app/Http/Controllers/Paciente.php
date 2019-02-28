<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;

class Paciente extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function consultas() 
    {
        $citas = new Cita();
        return $citas::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Cita();
        
        
        if($data->where('horaConsulta', '=', $request->input('horaConsulta'))->where('diaConsulta', '=',  $request->input('diaConsulta'))->count() > 0) 
        {
            return 0;
        }

        $data->diaConsulta = $request->input('diaConsulta');
        $data->horaConsulta = $request->input('horaConsulta');
        $data->fechaNacimiento = $request->input('fechaNacimiento');
        $data->nombrePaciente = $request->input('nombrePaciente');
        $data->apellidoPaciente = $request->input('apellidoPaciente');

        $data->save(); //www.becaseducacionsuperior.sep.gob.mx DIOStos

        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = new Cita();

        $cita = $cita->where('idConsulta', '=', $id);
        return $cita;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idConsulta)
    {
        $cita = new Cita();

        $cita = $cita->where('idConsulta', '=', $idConsulta);
        $cita->delete();//amosuna@upsin.edu.mx
        return redirect('/getConsultas');
    }
}
