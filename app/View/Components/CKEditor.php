<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CKEditor extends Component
{
    public $id;
    public $setFieldName;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $placeholder, $setFieldName)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->setFieldName = $setFieldName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.c-k-editor');
    }
}
