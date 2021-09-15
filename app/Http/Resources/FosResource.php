<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FosResource extends JsonResource
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
            'fos_observation' => $this->fos_observation,
            'fos_solution' => $this->fos_solution,
            'fos_file' => !empty($this->fos_file)?Storage::url($this->fos_file):null,
        ];
    }
}
