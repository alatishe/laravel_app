<?php

namespace App\Http\Responses\Backend\Rates;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    protected $rate;

    public function __construct($rate)
    {
        $this->rate = $rate;

    }

    public function toResponse($request)
    {
        return view('backend.rates.edit')->with([
            'rates' => $this->rate,
        ]);
    }
}
