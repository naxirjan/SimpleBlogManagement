<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(
        public string $id = "",
        public string $name = "",
        public string $type = "",
        public string $text = "",
        public string $icon = "",
        public string $class = "",
        public string $msgToolTip = "",
        public string $placement = "top"
    )
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
