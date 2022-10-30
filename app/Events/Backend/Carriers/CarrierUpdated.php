<?php

namespace App\Events\Backend\Carriers;

use Illuminate\Queue\SerializesModels;

/**
 * Class FaqUpdated.
 */
class CarrierUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $carrier;

    /**
     * @param $page
     */
    public function __construct($carrier)
    {
        $this->carrier = $carrier;
    }
}
