<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $emoji;
    public $title;
    public $description;
    public $link;

    public function __construct($emoji, $title, $description, $link)
    {
        $this->emoji = $emoji;
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
    }

    public function render()
    {
        return view('components.card');
    }
}
