<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DependencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rlco_id' => $this->rlco_id,
            'activity_name' => $this->activity_name,
            'department_id' => $this->department_id,
            'department' => new DepartmentResource($this->department),
            'priority' => !empty($this->priority) && $this->priority!=0?$this->priority:'N/A',
            'remark' => !empty($this->remark)?$this->remark:'N/A',
        ];
    }
}
