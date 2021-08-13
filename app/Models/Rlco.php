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
        'scope', 'fee', 'validity', 'time_taken', 'keywords', 'relevant_order_file', 'process_flow_diagram_file', 'challan_form_file', 'application_form_file', 'inspection_required', 'purpose_of_inspection',
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

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class);
    }

    public function businessActivity()
    {
        return $this->belongsTo(BusinessActivity::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function requiredDocuments()
    {
        return $this->belongsToMany(RequiredDocument::class);
    }

    public function inspectionDepartment(){
        return $this->belongsTo(Department::class,'inspection_department_id');
    }

    public function faqs(){
        return $this->hasMany(Faq::class)->orderBy('faq_order');
    }
    public function foss(){
        return $this->hasMany(Fos::class)->orderBy('fos_order');
    }
}
