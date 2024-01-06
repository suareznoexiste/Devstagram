<?php

namespace App\Livewire;

use Livewire\Component;

class Postlike extends Component
{



    public $post ;
    public $isLiked;
    public $likes;
    public function mount($post){
        // mount es como el contruc y ese is liked es como un bool que retorna 0 y 1
        $this->isLiked=$post->checklike(auth()->user());
        //is liked es ussado para comprobar si es like 
        $this->likes=$post->likes->count();
    }
    public function like(){

        // aqui refactorisamos el codigo por que livewire no soporta request
        // le ponemos el this por que ese post se recibe desde la vista donde se manda a llamar este post componente
        if ($this->post->checklike(auth()->user())) {
            $this->post->likes()->where('post_id',$this->post->id)->delete();
            $this->isLiked=false;
            $this->likes++;
            return back();
        }
        else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
             
            ]);
            $this->isLiked= true;
            $this->likes--;
        }
    }

    public function render()
    {
        return view('livewire.postlike');
    }
}
