<div>
  




    @if ($posts->count())
    <div>
        @foreach ($posts as $post)
            <div class="  grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <a href="{{ route('posts.show', ['user' =>$post->user, 'post' => $post]) }}">
                    
                    {{-- aqui lo que hacemos es concatener a la referencia 
                      de src , el nombre con la carpeta por que solo guardamos donde se guarda la imagen y no a 
                     no en la base de dato  --}}
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="imagen del post{{ $post->titulo }} ">
                </a>
            </div>
        @endforeach

    </div>
    <div class=" mt-4">
        {{ $posts->links() }}
        {{-- estos links son de paginacion o sea los links que paginan una lo 1 de 3 resultados--}}
    </div>
@else
    <p class=" text-gray-600 uppercase  text-sm  text-center font-bold "> no hay publicaciones actualmente </p>
@endif


</div>