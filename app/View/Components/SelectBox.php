<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Management\School;
use App\Models\CommonValues;
use Illuminate\Support\Facades\Auth;

class SelectBox extends Component
{
    /**
     * Create a new component instance.
     */

    public string $id;
    public string $name;
    public string $text;
    public string $type;
    public string $recordType;
    public bool   $required;
    public $fieldItems;


    public function __construct($id = "", $name = "", $text = "", $type = "",  $recordType = "", $required = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->recordType = $recordType;
        $this->text = $text;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $CommonValues = new CommonValues();
        switch ($this->recordType)
        {
            case "Branches": break;
            case "BrancheTypes": break;
            case "Countries":
                $this->fieldItems = $CommonValues::getCountriesList();
            break;
            case "Schools":
                $this->fieldItems = School::where('SchoolId', 1)->get(['SchoolId AS Key','SchoolName AS Value']);
            break;
            default:
                $this->fieldItems = array();
                break;
        }

        return view('components.select-box');
    }
}
