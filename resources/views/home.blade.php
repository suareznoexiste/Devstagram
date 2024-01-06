@extends('layout.app')
@section('titulo')
    pagina principal
@endsection
@section('contenido')
   
   {{--  esto es un componente el cual recibe  un parametro que es la variable que mando desde el controller --}}
   {{-- tambie lo tengo que hacer en el constructor del post  --}}
     <x-listarpublicaciones :posts="$posts"/>
@endsection
