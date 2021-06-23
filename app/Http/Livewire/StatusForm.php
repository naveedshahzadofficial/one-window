<?php

namespace App\Http\Livewire;

use App\Models\Status;
use App\Models\Statusable;
use Livewire\Component;
use Livewire\WithFileUploads;

class StatusForm extends Component
{
    use WithFileUploads;

    public $application;
    public $statuses;
    public $status_id;
    public $status_file;
    public $status_remark;

    protected $rules = [
        'status_id' => 'required',
        'status_file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:5120',
        'status_remark' => 'nullable|string',
    ];
    protected $messages = [
        'status_id.required' => 'Status is required.'
    ];

    public function mount($application)
    {
        $this->application = $application;
        $this->statuses = Status::where('status_type', 'applications')->where('status_status', 1)->orderBy('status_order_no')->get();
    }

    public function render()
    {
        $certification = $this->application->certification;
        $application_logs = Statusable::with('status','admin')->whereHas('certification',function ($q) use ($certification){
            $q->where('statusable_id', $certification->id);
        })->orderBy('created_at','desc')->get();
        return view('livewire.status-form',['application_logs'=>$application_logs]);
    }

    public function submitStatus()
    {
        //dd($this->application_logs);
        $this->validate();
        $status_file = null;
        if (!empty($this->status_file)) {
            $status_file = $this->status_file->store('statuses', 'public');
            $this->status_file = null;
        }
        $this->application->certification->statuses()
            ->attach($this->status_id,['user_id'=>auth()->id(),'user_type'=>'App\Models\Admin', 'log_remark'=>$this->status_remark, 'log_file'=>$status_file]);
        session()->flash('success_message', 'Status has been successfully updated.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['status_id', 'status_file', 'status_remark']);
        $this->dispatchBrowserEvent('reset:select2', ['id' => '#status_id', 'key_name' => 'status_id']);
    }
}
