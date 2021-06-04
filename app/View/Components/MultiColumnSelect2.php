<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MultiColumnSelect2 extends Component
{
    public $listing;
    public $id;
    public $fieldName;
    public $setFieldName;

    /**
     * Create a new component instance.
     *
     * @param $listing
     * @param $id
     * @param $fieldName
     * @param $setFieldName
     */
    public function __construct($listing, $id, $fieldName, $setFieldName)
    {
        $this->listing = $listing;
        $this->id = $id;
        $this->fieldName = $fieldName;
        $this->setFieldName = $setFieldName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.multi-column-select2');
    }
}
