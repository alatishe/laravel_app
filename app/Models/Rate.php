<?php

namespace App\Models;

use App\Models\Traits\Attributes\RateAttributes;
use App\Models\Traits\ModelAttributes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends BaseModel
{
    use ModelAttributes, SoftDeletes, RateAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['option_name','upper_weight','lower_weight','upper_height','lower_height','upper_width','lower_width','price'];
}
