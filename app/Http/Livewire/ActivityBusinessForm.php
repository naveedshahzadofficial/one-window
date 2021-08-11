<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActivityBusinessForm extends Component
{
    public $activity_id;

    public function render($activity_id=null)
    {
        return view('livewire.activity-business-form');
    }
}
