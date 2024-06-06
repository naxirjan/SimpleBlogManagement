<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextFieldFloatingLabel extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(
        public string $id = "",
        public string $name = "",
        public string $type = "",
        public string $text = "",
        public string $value = "",
        public bool $required = false,
        public string $errorMessage = "")
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-field-floating-label');
    }
}
