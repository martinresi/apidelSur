<?php

namespace App\Http\Controllers;

use App\Models\ConsultasTasaciones;
use Illuminate\Http\Request;

class ConsultasTasacionesController extends Controller
{
    
    public function index(){
        $tasaciones = ConsultasTasaciones::all();
        return $tasaciones;
    }

    public function generarTasacion(request $request){

        $tasaciones = new ConsultasTasaciones();

        $tasaciones->name = $request->name;
        $tasaciones->email = $request->email;
        $tasaciones->number = $request->number;
        $tasaciones->horario = $request->horario;
        $tasaciones->direccion = $request->direccion;
        $tasaciones->operacion = $request->operacion;
        $tasaciones->tipoPropiedad = $request->tipoPropiedad;
        $tasaciones->ambiantes = $request->ambiantes; // AMBIANTES    LE ERRE
        $tasaciones->supCubiertam2 = $request->supCubiertam2;
        $tasaciones->supTotalm2 = $request->supTotalm2;
        $tasaciones->garage = $request->garage;
        $tasaciones->extra = $request->extra;

        $tasaciones->save();
    }

    public  function show($id){

        $tasaciones =ConsultasTasaciones::find($id);
        return $tasaciones;
    }

    public function update(request $request, $id){

        $tasaciones= ConsultasTasaciones::findOrFail($request->$id);

        $tasaciones->name = $request->name;
        $tasaciones->email = $request->email;
        $tasaciones->number = $request->number;
        $tasaciones->horario = $request->horario;
        $tasaciones->direccion = $request->direccion;
        $tasaciones->operacion = $request->operacion;
        $tasaciones->tipoPropiedad = $request->tipoPropiedad;
        $tasaciones->ambiantes = $request->ambiantes; // AMBIANTES    LE ERRE
        $tasaciones->supCubiertam2 = $request->supCubiertam2;
        $tasaciones->supTotalm2 = $request->supTotalm2;
        $tasaciones->garage = $request->garage;
        $tasaciones->extra = $request->extra;

        $tasaciones->save();
        return $tasaciones;
    }

    public function destroy($id){
        $tasaciones = ConsultasTasaciones::destroy($id);
        return $tasaciones;
    }












}
