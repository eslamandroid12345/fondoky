<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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

            'id' => (int)$this->id,
            'destination' => $this->destination,
            'children' => $this->children,
            'adults' => $this->adults,
            'check_in' => Carbon::parse($this->check_in)->format('Y-m-d'),
            'check_out' => Carbon::parse($this->check_out)->format('Y-m-d'),
            'num_of_nights' => $this->num_of_nights,
            'room_number' => $this->room_number,
            'rate' => $this->rate,
            'vat_tax' => (float)$this->vat_tax,
            'municipal_tax' => (float)$this->municipal_tax,
            'tourism_tax' => (float)$this->tourism_tax,
            'total' => (float)$this->total,
            'total_all' => (float)$this->total_all,
            'commission' => (float)$this->commission,
            'stayed' => $this->stay(),
            'status' => $this->cancel(),
            'user' => new UserResource($this->user),
            'room' => new RoomResource($this->room),
            'hotel_id' => $this->hotel_id,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->created_at->format('Y-m-d'),

        ];
    }
}
