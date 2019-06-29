<?php

namespace App\Models\Traits\CategoryTraits;

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
        case 2:
        return __('Draft');
        case 3:
        return __('Private');
        }
    }

    public function getParentName()
    {
        if (isset($this->parentCategory)) {
            return $this->parentCategory->name;
        } else {
            return __('Category Parent');
        }
    }

    public function getListParentNames()
    {
        return $this->all()->pluck('name', 'id')->all();
    }
}
