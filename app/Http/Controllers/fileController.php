<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileController extends Controller
{
    //se van a subir las imagenes para las propiedades
    function upload(Request $req){
        $files = $req->file('files');
        
        foreach($files as $file) {
            $file->move(public_path('archivos'), $file->getClientOriginalName());
        }
        
        return response()->json([
            "files" => $req->file('files')
        ]);
    }
    
    function download(request $req){
        $path = storage_path('app\Archivos\ ');
        return response()->download($path);
    }

    public function getFiles() {
        // Lees la carpeta archivos
        // Listas los nombres
        // y retornar con el sig formato:::: http://DIRECCION:PUERTO/

            $dir = opendir(public_path('archivos'));
            $files = [];
            while($archivo = readdir($dir)) {
                if($archivo == '.' || $archivo == '..') {
                    continue;
                }
                array_push($files, $archivo);
            }
            return response()->json([
                'archivos' => $files
            ]);
    }
}
