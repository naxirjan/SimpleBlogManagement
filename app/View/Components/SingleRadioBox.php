<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleRadioBox extends Component
{
    /**
     * Create a new component instance.
     */
    public string $id;
    public string $name;
    public string $text;
    public string $value;
    public bool   $required;
    public bool   $checked;

    public function __construct($id = "", $name = "", $text = "", $value = "", $required = false, $checked = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->text = $text;
        $this->value = $value;
        $this->required = $required;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.single-radio-box');
    }
}
