<?php

namespace App\Http\Responses\Backend\Carriers;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    protected $carrier;

    public function __construct($carrier)
    {
        $this->carrier = $carrier;

    }

    public function toResponse($request)
    {
        return view('backend.carriers.edit')->with([
            'carriers' => $this->carrier,
        ]);
    }
}
