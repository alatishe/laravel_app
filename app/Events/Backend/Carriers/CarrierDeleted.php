<?php

namespace App\Events\Backend\Carriers;

use Illuminate\Queue\SerializesModels;

/**
 * Class FaqDeleted.
 */
class CarrierDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $carrier;

    /**
     * @param $faq
     */
    public function __construct($carrier)
    {
        $this->carrier = $carrier;
    }
}
