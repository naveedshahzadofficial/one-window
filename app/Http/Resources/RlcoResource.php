<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RlcoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "activity_id" => $this->activity_id??null,
            "application_url" => $this->application_url,
            "automated_system_link" => $this->automated_system_link,
            "automation_status" => $this->automation_status,
            "business_activity_id" => $this->business_activity_id,
            "business_category_id" => $this->business_category_id,
            "challan_form_file" => $this->challan_form_file,
            "department_id" => $this->department_id,
            "department_website" => $this->department_website,
            "dependency_question" => $this->dependency_question,
            "description" => $this->description,
            "fee" => !empty($this->fee)?number_format((float)$this->fee):null,
            "fee_schedule" => $this->fee_schedule,
            "fee_submission_mode" => $this->fee_submission_mode,
            "fine_details" => $this->fine_details,
            "generic_sector" => $this->generic_sector,
            "inspection_department_id" => $this->inspection_department_id,
            "inspection_required" => $this->inspection_required=='Both'?'Pre-inspection & Post-inspection':$this->inspection_required,
            "link_of_law" => $this->link_of_law,
            "manual_detail" => $this->manual_detail,
            "mode_of_inspection" => $this->mode_of_inspection,
            "payment_source" => $this->payment_source,
            "purpose" => $this->purpose,
            "renewal_fee" => $this->renewal_fee,
            "renewal_required" => $this->renewal_required,
            "rlco_name" => $this->rlco_name,
            "rlco_no" => $this->rlco_no,
            "rlco_status" => $this->rlco_status,
            "scope" => $this->scope,
            "time_taken" => $this->time_taken,
            "time_unit" => !empty($this->time_unit)?substr_replace($this->time_unit ,"(s)",-1):null,
            "title_of_law" => $this->title_of_law,
            "validity" => $this->validity,
            "application_form_file" => !empty($this->application_form_file)?Storage::url($this->application_form_file):null,
            "process_flow_diagram_file" => !empty($this->process_flow_diagram_file)?Storage::url($this->process_flow_diagram_file):null,
            "relevant_laws_file" => !empty($this->relevant_laws_file)?Storage::url($this->relevant_laws_file):null,
            "business_category" => new BusinessCategoryResource($this->businessCategory), // object
            "department" => new DepartmentResource($this->department), // object
            "inspection_department" => new DepartmentResource($this->inspectionDepartment), // object
            "dependencies" => DependencyResource::collection($this->dependencies), // array
            "faqs" => FaqResource::collection($this->faqs), // array
            "foss" => FosResource::collection($this->foss), // array
            "other_documents" => OtherDocumentResource::collection($this->otherDocuments), // array
            "required_documents" => RequiredDocumentResource::collection($this->requiredDocuments), // array

        ];
    }
}
