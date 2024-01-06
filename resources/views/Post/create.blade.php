@extends('layout.app')
@section('titulo')
Crear Post
@endsection

{{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />



@section('contenido')
    <div class=" md:flex md:items-center flex  justify-around" >
        <div class=" md:w-1/2   px-10">
   <!-- Example of a form that Dropzone can take over -->
   <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
    @csrf
</form>

        </div>
        <div class="md:w-1/2    mt-10 md:mt-0  bg-slate-100 p-6 rounded-lg shadow">


            <form action="{{route('post.store')}}" method="POST" >
                @csrf 
                {{-- es algo de seguridad cross ride site --}}
                <div class=" mb-5">
                  <label for="titulo" class=" mb-2 block   text-gray-500 font-bold ">Titulo</label>
                  <input id="titulo" type="text"
                  placeholder="ingresa el titulo"
                  name="titulo" value="{{old('titulo')}}" 
                  class=" border p-3 w-full rounded-lg   @error('titulo')
                    border-red-600
                  @enderror" >
                  {{-- El old es para guardar el dato que ingresamos anteriormente --}}
          {{-- el @error es de laravel y agrega un mensaje de error y arriba le agregar un border dw color --}}
              </div>
              @error('titulo')
                <p class=" bg-red-600 text-center font-medium text-white p-2">{{$message}}</p>
              @enderror

              <div class=" mb-5">
                <label for="descripcion" class=" mb-2 block   text-gray-500 font-bold ">Descripcion</label>
                <textarea id="descripcion" type="text"
                placeholder="ingresa la descripcion"
                name="descripcion"  
                class=" border p-3 w-full rounded-lg   @error('descripcion')
                  border-red-600
                @enderror" > {{old('descripcion')}}</textarea>
                {{-- El old es para guardar el dato que ingresamos anteriormente --}}
        {{-- el @error es de laravel y agrega un mensaje de error y arriba le agregar un border dw color --}}
            </div>
            @error('descripcion')
              <p class=" bg-red-600 text-center font-medium text-white p-2">{{$message}}</p>
            @enderror
            
         <div class=" mb-5">
          {{-- Aqui creamos un campo vacio para almacenar la imagen  --}}
             <input name="imagen" id="imagen" type="hidden" />
             @error("imagen")
             <p class="dropzone bg-red-600 text-center font-medium text-white p-2">{{$message}}</p>
           @enderror
         </div>


            <input type="submit" value="Crear Cuenta"
            class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer  font-bold text-white rounded-lg w-full  p-3  uppercase ">
    



            </form>











            
        </div>











    </div>
@endsection