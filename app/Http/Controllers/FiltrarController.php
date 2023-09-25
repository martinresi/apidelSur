<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Elemento;


class FiltrarController extends Controller
{
    public function filtrar(Request $request){ 
    
    $filtro = $request->input('filtro');

    if ($filtro === 'venta') {

        $elementos = Elemento::where('tipo', 'venta')->get();
    } 
    elseif ($filtro === 'alquiler') {

        $elementos = Elemento::where('tipo', 'alquiler')->get();
    } 
    else {

        $elementos = Elemento::all();
    }

    return response()->json(['elementos' => $elementos]);
}





}
