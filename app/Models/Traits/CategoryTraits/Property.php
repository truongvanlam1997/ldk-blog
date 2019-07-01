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
    public function getArrayCategories() // lấy array category để tiết kiệm query khi đệ quy tìm menu con.
    {
        $arrayCategories = [];
        $categories = $this->all();
        foreach ($categories as $category) {
            $arrayCategories[]= $category ;
        }
        //   dd($arrayCategories);
        return $arrayCategories ;
    }
    public function displayCategories(array $arrayCategories, $parent_id = 0, $dem = 0)
    {
        $categoryChild = array();
        foreach ($arrayCategories as $key => $category) {
            // Nếu là chuyên mục con thì hiển thị
            if ($category->parent_id == $parent_id) {
                $categoryChild[] = $category;
                unset($arrayCategories[$key]);
            }
        }
         
        // HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($categoryChild != '') {
            echo ' <div class =container mr-10 mt-5>';
           
            foreach ($categoryChild as $index => $category) {
                // Hiển thị tiêu đề category
                
                echo '<div class="form-check">' ;
                echo  '<label class="form-check-label">';
                echo ' <input type="checkbox" class="form-check-input" name="categoryId[] "  value="' . $category->id. '">' .$category->name ;
               
                        
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $this-> displayCategories($arrayCategories, $category->id, ++$dem);
                echo  '</label>';
                echo  '</div>';
            }
            
            echo  '</div>';
        }
    }
}
