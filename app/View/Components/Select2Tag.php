<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select2Tag extends Component
{
    public $fieldName;
    public $listing;
    public $id;
    public $setFieldName;
    public $isMultiple;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fieldName, $listing, $id, $setFieldName, $isMultiple=false)
    {
        $this->fieldName = $fieldName;
        $this->id = $id;
        $this->listing = $listing;
        $this->setFieldName = $setFieldName;
        $this->isMultiple = $isMultiple;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select2-tag');
    }
}
