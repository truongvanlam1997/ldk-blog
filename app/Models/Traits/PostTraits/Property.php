<?php

namespace App\Models\Traits\PostTraits;

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
    public function getTags()
    {
        return $this->tags;
    }

    public function getArrayTagOfPost()
    {
        $arrayTagOfPost = [];
        $tags = $this->tags;
        if ($tags->count()) {
            foreach ($tags as $index => $tag) {
                $arrayTagOfPost[$index] = $tag->name;
            }
            return $arrayTagOfPost;
        }
        
        return $arrayTagOfPost;
    }
}
