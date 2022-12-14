<?php

namespace App\View\Components;

use Illuminate\View\Component;

class contactCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $subtitle;
    public $icon;
    public function __construct($title="visit our office",$subtitle="9051 Constra Incorporate, USA",$icon="map-marker-alt")
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact-card');
    }
}
