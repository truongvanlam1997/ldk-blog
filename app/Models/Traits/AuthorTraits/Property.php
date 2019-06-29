<?php

namespace App\Models\Traits\AuthorTraits;

trait Property
{
    public function getStatus()
    {
        $index = $this->status;
       
        
        switch ($index) {
        case 0:
            return __('Disabled');
        case 1:
        return __('Enabled');
        
        
}
    }
}
