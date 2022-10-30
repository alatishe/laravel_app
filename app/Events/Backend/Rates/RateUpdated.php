<?php

namespace App\Events\Backend\Rates;

use Illuminate\Queue\SerializesModels;

/**
 * Class RateUpdated.
 */
class RateUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $rate;

    /**
     * @param $page
     */
    public function __construct($rate)
    {
        $this->rate = $rate;
    }
}
