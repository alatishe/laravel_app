<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CarriersResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'partner_name' => $this->partner_name,
            'partner_email' => $this->partner_email,
            'carrier_name' => $this->carrier_name,
        ];
    }
}
