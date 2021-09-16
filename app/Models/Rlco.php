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
        'scope','title_of_law', 'link_of_law', 'automation_status', 'fee', 'renewal_required','renewal_fee', 'fee_submission_mode', 'payment_source', 'validity', 'time_taken' , 'automated_system_link',
        'process_flow_diagram_file', 'challan_form_file', 'application_form_file', 'inspection_required', 'fine_details',
        'relevant_laws_file', 'mode_of_inspection', 'inspection_department_id',
         'manual_detail', 'admin_id', 'rlco_status', 'dependency_question', 'time_unit', 'generic_sector', 'purpose', 'application_url', 'department_website', 'fee_schedule'];

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

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
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

    public function dependencies(){
        return $this->hasMany(Dependency::class)->orderBy('priority');
    }

    public function otherDocuments(){
        return $this->hasMany(OtherDocument::class);
    }

    public function businessActivities()
    {
        return $this->belongsToMany(BusinessActivity::class);
    }
}
