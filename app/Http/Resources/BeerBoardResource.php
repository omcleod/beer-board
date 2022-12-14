<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BeerBoardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'beer_id' => $this->beer->id,
            'name' => $this->beer->name,
            'brewery' => $this->beer->brewery->name,
            'abv' => $this->beer->abv,
            'style' => $this->beer->style->name,
            'price' => $this->price,
        ];
    }
}
