<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{

    public function toArray($request)
    {

        return [

            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => asset('admins/' . $this->image),
            'phone' => $this->phone,
            'permissions' => $this->role->permissions,
            'token' => 'Bearer ' . $this->token,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->created_at->format('Y-m-d'),
        ];

    }
}
