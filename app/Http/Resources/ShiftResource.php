<?php

namespace App\Http\Resources;

use App\Models\Shift;
use App\Objects\ValuesObject\ShiftValues;
use Illuminate\Http\Resources\Json\JsonResource;

class ShiftResource extends JsonResource
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
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'status' => $this->resource->status,
            'status_name' => trans(ShiftValues::STATUS_TEXT[$this->resource->status])
        ];
    }
}
