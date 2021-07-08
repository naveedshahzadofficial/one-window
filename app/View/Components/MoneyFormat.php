<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MoneyFormat extends Component
{
    public $class;
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param $class
     * @param string $placeholder
     */
    public function __construct($class,$placeholder='')
    {
        $this->class = $class;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.money-format');
    }
}
