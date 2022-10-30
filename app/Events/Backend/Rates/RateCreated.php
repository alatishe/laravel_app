<?php

namespace App\Events\Backend\Rates;

use Illuminate\Queue\SerializesModels;

/**
 * Class RateCreated.
 */
class RateCreated
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
