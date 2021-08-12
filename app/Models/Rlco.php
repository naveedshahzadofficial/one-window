<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rlco extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rlco_no', 'rlco_name', 'description', 'department_id', 'business_category_id', 'business_activity_id',
        'scope', 'fee', 'validity', 'time_taken', 'keywords', 'relevant_order_file', 'process_flow_diagram_file', 'challan_form_file', 'application_form_file', 'inspection_required', 'purpose_of_inspection_file',
        'relevant_laws_file', 'relevant_rules_file', 'relevant_notification_file', 'mode_of_inspection', 'inspection_department_id', 'applicable_fines_file', 'current_maintained', 'online_url', 'remark','admin_id', 'rlco_status'];

    public function getRlcoStatus()
    {
        return ($this->rlco_status)?'Active':'Inactive';
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $max_number = Rlco::max('id')+1;
            $model->rlco_no = str_pad($max_number, 7,'0',STR_PAD_LEFT).Carbon::today()->year;
        });
    }
}
