<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\BusinessCategory;
use App\Models\Department;
use App\Models\Rlco;
use Livewire\Component;
use Livewire\WithPagination;

class SearchRlco extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $departments;
    public $businesses;
    public $activities;


    public $department_id;
    public $activity_id;
    public $business_category_id;

    public $search = false;

    protected $rules = [
        'department_id' => 'required',
        'business_category_id' => 'required|string',
    ];

    protected $messages = [
        'department_id.required' => 'Department is required.',
        'business_category_id.required' => 'Business is required.',
    ];

    public function mount()
    {
        $this->departments = Department::where('department_status',1)->get();
        $this->businesses = BusinessCategory::where('category_status',1)->get();
        $this->activities = Activity::orderBy('activity_order')->where('activity_status',1)->get();

    }
    public function render()
    {
        $rlcos = Collect();

        if($this->search){

            $query = Rlco::query();
            if(!empty($this->department_id))
                $query->where('department_id', $this->department_id);

            if(!empty($this->business_category_id))
                $query->where('business_category_id',$this->business_category_id);

            if(!empty($this->activity_id)) {
                $query->whereHas('activities', function ($q) {
                    $q->where('activity_id', $this->activity_id);
                });
            }
            $rlcos = $query->where('rlco_status',1)->paginate(30);
        }

        return view('livewire.search-rlco',compact('rlcos'));
    }

    public function searchForm()
    {
        $this->validate();
        $this->search = true;
        $this->resetPage();

    }

}
