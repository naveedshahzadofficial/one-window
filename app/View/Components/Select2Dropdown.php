<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select2Dropdown extends Component
{

    public $fieldName;
    public $listing;
    public $id;
    public $setFieldName;

    /**
     * Create a new component instance.
     *
     * @param $fieldName
     * @param $listing
     */
    public function __construct($fieldName, $listing, $id, $setFieldName)
    {
        $this->fieldName = $fieldName;
        $this->id = $id;
        $this->listing = $listing;
        $this->setFieldName = $setFieldName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select2-dropdown');
    }
}
