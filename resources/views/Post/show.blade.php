@extends('layout.app')
@section('titulo')
    {{ $post->titulo }}
    {{-- lo recibimos de la vista  --}}
@endsection
@section('contenido')
    <div class=" mx-auto flex container">
        <div class=" md:w-1/2">

            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="imagen del post{{ $post->titulo }}">

            <div class=" p-3 flex items-center gap-4">

                @auth
                <livewire:postlike :post="$post" />

                    
                @endauth



            </div>
            <div>
                <p class=" font-bold">{{ $post->user->username }} </p>
                {{-- eso de arriba es gracias a las relaciones --}}
                <p class=" text-sm text-gray-600">
                    {{ $post->created_at->diffForHumans() }}
                    {{-- difforhumans lo muestra de manera que diga ejemplo hace 1 dia  --}}
                </p>
                <p class=" text-xs mt-5  text-gray-700">
                    {{ $post->descripcion }}
                </p>
            </div>
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route('post.destroy', $post) }}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar Publicación"
                            class=" bg-red-600  hover:bg-red-600  rounded text-white font-bold  p-1 cursor-pointer">
                    </form>
                @endif
            @endauth

        </div>


        <div class=" md:w-1/2 p-5">
            <div class=" shadow bg-white p-5 mb-5 ">
                @auth

                    <p class="  text-xl font-bold text-center mb-4"> agrega un nuevo comentario </p>
                    @if (session('mensaje'))
                        {{-- en el controlador creamos ese session mensaje y aqui validamos si existe con un true y si existe pues lo imprimimos --}}
                        <p class=" bg-green-600 text-center font-medium text-white p-2">
                            {{ session('mensaje') }}</p>
                    @endif
                    <form method="POST" action="{{ route('posts.show', ['user' => $user, 'post' => $post]) }}">
                        @csrf


                        <div class=" mb-5">
                            <label for="comentario" class=" mb-2 block   text-gray-500 font-bold ">Descripcion</label>
                            <textarea id="comentario" type="text" placeholder="ingresa la descripcion" name="comentario"
                                class=" border p-3 w-full rounded-lg   @error('comentario')
                              border-red-600
                            @enderror"> </textarea>
                            @error('comentario')
                                <p class=" bg-red-600 text-center font-medium text-white p-2">{{ $message }}</p>
                            @enderror

                        </div>
                        <input type="submit" value="Comentar"
                            class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer  font-bold text-white rounded-lg w-full  p-3  uppercase ">
                    </form>
                @endauth

                <div class=" bg-white shadow mb-5  max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentario->count())
                        @foreach ($post->comentario as $comentario)
                            <div class=" p-5 border-gray-300 border-b">
                                <a href="{{ route('muro', $post->user) }}">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class=" text-sm text-gray-600">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class=" p-10 text-center"> no hay comentarios en esta publicación</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
