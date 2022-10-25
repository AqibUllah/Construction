<?php

namespace App\View\Components;

use Illuminate\View\Component;

class banner extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $img;
    public function __construct($title='',$img='/assets/images/banner/banner1.jpg')
    {
        $this->title = $title;
        $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner');
    }
}
