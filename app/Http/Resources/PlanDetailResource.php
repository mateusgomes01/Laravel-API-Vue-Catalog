<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'plan_id' => $this->plan_id,
            'installments' => $this->installments,
            'visa_master' => $this->visa_master,
            'others' => $this->others,
            'mup' => $this->mup
        ];
    }
}
