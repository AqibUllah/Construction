<?php

namespace App\View\Components;

use App\Models\Service;
use App\Repositories\Interfaces\IServices;
use Illuminate\View\Component;

class footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $latestServices = Service::latest()->take(5)->get();
        return view('components.footer',compact('latestServices'));
    }
}
