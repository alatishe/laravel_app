<?php

namespace App\Models\Traits\Attributes;

trait CarrierAttributes
{


    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">'.
                $this->getEditButtonAttribute('edit-carrier', 'admin.carriers.edit').
                $this->getDeleteButtonAttribute('delete-carrier', 'admin.carriers.destroy').
                '</div>';
    }

}
