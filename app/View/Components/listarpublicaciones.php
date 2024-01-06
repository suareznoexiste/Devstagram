<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listarpublicaciones extends Component
{
    /**
     * Create a new component instance.
     */

     public $posts;
    public function __construct($posts)
    {  
        // muy importante siempre el mismo nombre de variabl
        // todo esto para pasar una pinche variable desde el controllador  al home
        
     $this->posts=$posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.listarpublicaciones');
    }
}
