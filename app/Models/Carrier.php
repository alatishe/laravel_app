<?php

namespace App\Models;

use App\Models\Traits\Attributes\CarrierAttributes;
use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrier extends BaseModel
{
    use ModelAttributes, SoftDeletes, CarrierAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['partner_name', 'partner_email', 'carrier_name'];
}
