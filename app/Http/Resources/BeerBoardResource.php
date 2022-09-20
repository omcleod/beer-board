<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Beer;

class BeerBoardResource extends JsonResource
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
            'name' => $this->beer->name,
            'brewery' => $this->beer->brewery->name,
            'abv' => $this->beer->abv,
            'style' => $this->beer->style->name,
            'price' => $this->price,
        ];
    }
}
