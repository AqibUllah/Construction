<?php

namespace App\Repositories\Services;

use App\Models\Category;
use App\Repositories\Interfaces\ICategory;
use Illuminate\Http\Request;

class Categories implements ICategory {

    public function getAllCategories()
    {
        return Category::OrderBy('id','DESC')->get();
    }

    public function addCategory($payload)
    {
        $category = Category::create([
            'category' => $payload['category'],
            'description' => $payload['description']
        ]);
        return $category;
    }
}
