<?php

namespace App\Models\Traits\Attributes;

trait RateAttributes
{


    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.
                $this->getEditButtonAttribute('edit-rate', 'admin.rates.edit').
                $this->getDeleteButtonAttribute('delete-rate', 'admin.rates.destroy').
                '</div>';
    }

}
