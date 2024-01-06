 @extends('layout.app')
 @section('titulo')
     Editar perfil :{{ auth()->user()->username }}
 @endsection

 @section('contenido')
     <div class=" md:flex md:justify-center">

        {{--  el multipart form data es para subir imagenes --}}
         <div class=" md:w-1/2 bg-white shadow p-6">
             <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data"  class=" mb-5 md:mb-0">
    @csrf
                 <div class=" mb-5">
                     <label for="username" class=" mb-2 block   text-gray-500 font-bold ">username</label>
                     <input id="username" type="text" placeholder="ingresa el nombre" name="username"
                         value="{{ auth()->user()->username }}"
                         class=" border p-3 w-full rounded-lg   @error('name')
              border-red-600
            @enderror">
                     {{-- El old es para guardar el dato que ingresamos anteriormente --}}
                     {{-- el @error es de laravel y agrega un mensaje de error y arriba le agregar un border dw color --}}
                     @error('username')
                         <p class=" bg-red-600 text-center font-medium text-white p-2">{{ $message }}</p>
                     @enderror
                 </div>
                 
                 <div class=" mb-5">
                    <label for="email" class=" mb-2 block   text-gray-500 font-bold ">email</label>
                    <input id="email" type="text" placeholder="ingresa el nombre" name="email"
                        value="{{ auth()->user()->email }}"
                        class=" border p-3 w-full rounded-lg   @error('name')
             border-red-600
           @enderror">
                    {{-- El old es para guardar el dato que ingresamos anteriormente --}}
                    {{-- el @error es de laravel y agrega un mensaje de error y arriba le agregar un border dw color --}}
                    @error('email')
                        <p class=" bg-red-600 text-center font-medium text-white p-2">{{ $message }}</p>
                    @enderror
                </div>
                 <div class=" mb-5">
                     <label for="imagen" class=" mb-2 block   text-gray-500 font-bold ">perfil</label>
                     <input id="imagen" type="file"name="imagen" accept=".jpg, .png, .jpeg"
                         class=" border p-3 w-full rounded-lg   ">

                 </div>
                 <input type="submit" value="editar perfil"
                 class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer  font-bold text-white rounded-lg w-full  p-3  uppercase ">
         
               
             </form>
         </div>
     </div>
 @endsection
