<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
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
            'room_type' => $this->room_type,
            'hotel' => new HotelResource($this->hotel),
            'room_description' => $this->room_description,
            'adults_max' => $this->adults_max,
            'child_max' => $this->child_max,
            'images' => $this->images,
            'slug' => $this->slug,
            'smoke' => $this->smoke,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->created_at->format('Y-m-d'),

        ];
    }
}
