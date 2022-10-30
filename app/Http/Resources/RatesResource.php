<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RatesResource extends Resource
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
            'option_name' => $this->option_name,
            'upper_weight' => $this->upper_weight,
            'lower_weight' => $this->lower_weight,
            'upper_height' => $this->upper_height,
            'lower_height' => $this->lower_height,
            'upper_width' => $this->upper_width,
            'lower_width' => $this->lower_width,
            'price' => $this->price,
        ];
    }
}
