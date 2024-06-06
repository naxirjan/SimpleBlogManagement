<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public string $id;
    public string $name;
    public string $value;
    public string $class;
    public string $type;
    public string $required;

    /**
     * Create a new component instance.
     */

    public function __construct($id = "", $name = "", $value = "", $class = "", $type = "", $required = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->class = $class;
        $this->type = $type;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
