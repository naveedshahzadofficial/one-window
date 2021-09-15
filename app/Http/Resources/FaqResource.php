<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class FaqResource extends JsonResource
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
            'faq_question' => $this->faq_question,
            'faq_answer' => $this->faq_answer,
            'faq_file' => !empty($this->faq_file)?Storage::url($this->faq_file):null,
        ];
    }
}
