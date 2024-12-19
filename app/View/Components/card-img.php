<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardImg extends Component
{
    public $image;
    public $title;
    public $description;
    public $buttonText;
    public $buttonLink;

    public function __construct($image, $title, $description, $buttonText, $buttonLink)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->buttonText = $buttonText;
        $this->buttonLink = $buttonLink;
    }

    public function render()
    {
        return view('components.card-img');
    }
}
