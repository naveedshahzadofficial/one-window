<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputMask extends Component
{
    public $class;
    public $readonly;
    public $placeholder;
    public $mask;
    public $maskPlaceholder;
    public $isInvalid;

    /**
     * Create a new component instance.
     *
     * @param $class
     * @param $mask
     * @param string $placeholder
     * @param string $maskPlaceholder
     * @param null $isInvalid
     * @param null $readonly
     */
    public function __construct($class, $mask, $placeholder='',$maskPlaceholder='',$isInvalid=null ,$readonly=null)
    {
        $this->class = $class;
        $this->mask = $mask;
        $this->placeholder = $placeholder;
        $this->maskPlaceholder = $maskPlaceholder;
        $this->isInvalid = $isInvalid;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-mask');
    }
}
