<?php

namespace App\Events\Backend\Carriers;

use Illuminate\Queue\SerializesModels;

/**
 * Class Carrier Created.
 */
class CarrierCreated
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
