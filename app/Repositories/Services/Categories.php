<?php

namespace App\Repositories\Services;

use App\Models\Category;
use App\Repositories\Interfaces\ICategory;
use App\Models\Service;
use Illuminate\Http\Request;

class Categories implements ICategory {

    public function getAllCategories()
    {
        return Category::OrderBy('id','DESC')->paginate(10);
    }

    public function addCategory($payload)
    {
        $category = Categories::create([
            'category' => $payload['category'],
            'description' => $payload['description']
        ]);
        return $category;
    }
}
