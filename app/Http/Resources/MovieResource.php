<?php

namespace App\Http\Resources;

use App\Models\Movie;
use App\Objects\ValuesObject\MovieValues;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'status_name' =>  trans(MovieValues::STATUS_TEXT[$this->resource->status]),
            'posted_date' => $this->resource->posted_date,
        ];
    }
}
