<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class activitie extends Component
{
    /**
     * Create a new component instance.
     */
    public $activitie;
    public function __construct($activitie)
    {
        $this->activitie = $activitie;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.activitie');
    }
}
