<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosPropiedad;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DatosPropiedadController extends Controller
{
    public function index(Request $request)
    {
       
        $propiedades = DatosPropiedad::when(isset($request->destacado), function($query) use ($request) {
            $query->where('destacado', $request->destacado);
        })
        ->when(isset($request->operacion), function ($query) use ($request) {
            $query->where('operacion', $request->operacion);
        })
        ->when(isset($request->categoria), function ($query) use ($request) {
            $query->where('categoria', $request->categoria);
        })
        ->when(isset($request->precio), function ($query) use ($request) {
            $query->orderBy('precio', $request->precio);
        })
        ->when(isset($request->busqueda), function ($query) use ($request) {
            $query->where("direccion", "like", "%{$request->busqueda}%");
        })
        ->paginate(10, ['*'], 'page', $request->page ?? 1);

        foreach ($propiedades as $propiedad) {
            $files = glob(public_path('archivos') . '/' . $propiedad->id . '_*.jpg');
            $clean_files = [];
            foreach ($files as $file) {
                $exploded = explode("/", $file);
                array_push($clean_files, $exploded[count($exploded) - 1]);
            }

            $propiedad->images = $clean_files;
        }
        return $propiedades;


    }
    public function mostrarTodo(Request $request)
    {
        $propiedades = DatosPropiedad::all();
        return $propiedades;
    }

    public function destacadas(Request $request)
    {
        $propiedades = DatosPropiedad::paginate(100, ['*'], 'page', $request->page ?? 1)->where('destacada', 1);
        return $propiedades;
    }



    public function register(request $request)
    {

        $propiedades = new DatosPropiedad();

        $propiedades->id = $request->id;
        $propiedades->titulo = $request->titulo;
        $propiedades->direccion = $request->direccion;
        $propiedades->descripcion = $request->descripcion;
        $propiedades->m2 = $request->m2;
        $propiedades->totalm2 = $request->totalm2;
        $propiedades->ambientes = $request->ambientes;
        $propiedades->dormitorios = $request->dormitorios;
        $propiedades->banios = $request->banios;
        $propiedades->garage = $request->garage;
        $propiedades->categoria = $request->categoria;
        $propiedades->operacion = $request->operacion;
        $propiedades->precio = $request->precio;
        $propiedades->destacado = $request->destacado;

        $propiedades->map = $request->map;

        $propiedades->save();
    }

    public function show($id)
    {
        $propiedades = DatosPropiedad::find($id);
        return $propiedades;
    }

    public function update(request $request, $id)
    {

        $propiedades = DatosPropiedad::findOrFail($request->$id);

        $propiedades->titulo = $request->titulo;
        $propiedades->direccion = $request->direccion;
        $propiedades->descripcion = $request->descripcion;
        $propiedades->m2 = $request->m2;
        $propiedades->totalm2 = $request->totalm2;
        $propiedades->ambientes = $request->ambientes;
        $propiedades->dormitorios = $request->dormitorios;
        $propiedades->banios = $request->banios;
        $propiedades->garage = $request->garage;
        $propiedades->categoria = $request->categoria;
        $propiedades->operacion = $request->operacion;
        $propiedades->precio = $request->precio;
        $propiedades->destacado = $request->destacado;

        $propiedades->map = $request->map;

        $propiedades->save();
        return $propiedades;
    }

    public function destroy($id)
    {
        $propiedad = DatosPropiedad::where("id", $id)->first();
        $files = glob(public_path('archivos') . '/' . $propiedad->id . '_*.jpg');
        foreach($files as $file) {
            unlink($file);
        }
        $propiedad->delete();

        return response ()->json([
            "status" => "ok"
        ]);
    }

    public function save(request $request)
    {
    }

    public function last()
    {
        $ID = DB::table('datos_propiedads')->orderBy('id', 'desc')->first()->id ?? 0;
        return response()->json([
            'id' => $ID +1 
        ]);
    }

    public function images(Request $request)
    {
        $files = glob(public_path('archivos') . '/' . $request->id . '_*.jpg');

        $clean_files = [];
        foreach ($files as $file) {
            $exploded = explode("/", $file);
            array_push($clean_files, $exploded[count($exploded) - 1]);
        }
        


        return response()->json(['files' => $clean_files]);
    }

}
