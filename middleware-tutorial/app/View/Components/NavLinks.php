<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLinks extends Component
{
    public function __construct(public $active = false)
    {

    }
    public function render()
    {
        return view('components.nav-links');
    }
}
