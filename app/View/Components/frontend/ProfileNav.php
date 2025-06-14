<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;

class ProfileNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $image;
    public function __construct($name, $image)
    {
        //dynamic data
        $this->name = $name;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.profile-nav');
    }
}
