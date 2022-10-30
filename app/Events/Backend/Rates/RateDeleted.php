<?php

namespace App\Events\Backend\Rates;

use Illuminate\Queue\SerializesModels;

/**
 * Class RateDeleted.
 */
class RateDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $rate;

    /**
     * @param $rate
     */
    public function __construct($rate)
    {
        $this->rate = $rate;
    }
}
