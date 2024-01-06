<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class imagencontroller extends Controller
{
    //
  public function store( Request $request){
    //identificar que archivo estamos subiendo 

  $imagen=$request->file('file'); // la repuesta del file pero asu vez se llama file
  $nombreImagen= Str::uuid().'.'.$imagen->extension(); //aqui le asignamo un id unico y le agregamos la extension
  $imagenServidor= image::make($imagen);//make nos permite crear una imagen de intervetion image
  // aqui usamos la libreria de paquet imageinterview
  //la imagen que se creaba en memeria sera parte de la imagen que se formaba en memroria 

  $imagenServidor->fit(1000,1000) ;// aqui le decimos cuanto mide cad a imagen
  $imagenPath=public_path('uploads').'/'.$nombreImagen; // path donde se guarda apunta al public path y le asigna el name unico
  $imagenServidor->save($imagenPath);
  return response()->json(['imagen' =>$nombreImagen]); //retorna la repuesta json y le dice que le diga la extension
  //en resumen guardamos la imagen en un path
  // y luego retornarnamoe en un json el nombre creado antes con id unique idd
  }
}
