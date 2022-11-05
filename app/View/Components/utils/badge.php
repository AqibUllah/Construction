<?php

namespace App\View\Components\utils;

use Illuminate\View\Component;

class badge extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public function __construct($title='primary')
    {
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.utils.badge');
    }
}
