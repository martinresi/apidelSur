<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosPropiedades;
use Illuminate\Support\Facades\Validator;

class DatosPropiedadesController extends Controller
{
    public function index(){
        $propiedades = DatosPropiedades::all();  //TRAER TODAS LAS CASAS
        return $propiedades;
    }

    public function register(request $request){

        $propiedades = new DatosPropiedades();

        $propiedades->titulo = $request->titulo;
        $propiedades->direccion = $request->direccion;
        $propiedades->descripcion = $request->descripcion;
        $propiedades->m2 = $request->m2;
        $propiedades->ambientes = $request->ambientes;
        $propiedades->dormitorios = $request->dormitorios;
        $propiedades->banios = $request->banios;
        $propiedades->garage = $request->garage;
        $propiedades->categoria = $request->categoria;
        $propiedades->operacion = $request->operacion;
        $propiedades->precio = $request->precio;

        $propiedades->save();
    }

    public function show($id){
        $propiedades = DatosPropiedades::find($id);
        return $propiedades;
    }

    public function update(request $request, $id){

        $propiedades = DatosPropiedades::findOrFail($request->$id);
        $propiedades->titulo = $request->titulo;
        $propiedades->direccion = $request->direccion;
        $propiedades->descripcion = $request->descripcion;
        $propiedades->m2 = $request->m2;
        $propiedades->ambientes = $request->ambientes;
        $propiedades->dormitorios = $request->dormitorios;
        $propiedades->banios = $request->banios;
        $propiedades->garage = $request->garage;
        $propiedades->categoria = $request->categoria;
        $propiedades->operacion = $request->operacion;
        $propiedades->precio = $request->precio;

        $propiedades->save();
        return $propiedades;

    }

    public function destroy($id){
        $propiedades = DatosPropiedades::destroy($id);
        return $propiedades;
    }

    public function save(request $request){

        
    }

















}
