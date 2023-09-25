<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\ConsultasGente;

class ConsultasGenteController extends Controller
{
    public function index(){
        $consultas = ConsultasGente::all();
        return $consultas;
    }
    
    public function generarConsulta(request $request){
        $consultas = new ConsultasGente();
        $consultas->fullname = $request->fullname;
        //$consultas->IDProp = $request->IDProp;
        $consultas->number = $request->number;
        $consultas->email = $request->email;
        $consultas->descripcion = $request->descripcion;

        $consultas->save();
    }

    public function show($id){
        $consultas = ConsultasGente::find($id);
        return $consultas;
    }

    public function update (request $request, $id){
        $consultas = ConsultasGente::findOrFail($request->$id);
        $consultas->fullname = $request->fullname;
        //$consultas->IDProp = $request->IDProp;
        $consultas->number = $request->number;
        $consultas->email = $request->email;

        $consultas->save();
        return $consultas;


    }

    public function destroy($id){
        $consultas = ConsultasGente::destroy($id);
        return $consultas; 
    }


    public function save(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'telefono'=> 'required | number',
            'descripcion'=> '',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 200);
        }
    }



}
