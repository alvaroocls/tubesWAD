<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
   
    /**
     * Create a new component instance.
     */
    public $emoji;
    public $title;
    public $description;
    public function __construct($emoji, $title, $description)
    {
        //
        $this->emoji = $emoji;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
