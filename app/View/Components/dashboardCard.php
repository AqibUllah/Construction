<?php

namespace App\View\Components;

use Illuminate\View\Component;

class dashboardCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $value;
    public $icon;
    public function __construct($title,$value,$icon)
    {
        $this->title = $title;
        $this->value = $value;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-card');
    }
}
