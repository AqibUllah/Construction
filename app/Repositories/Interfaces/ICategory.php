<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface ICategory {
    public function getAllCategories();
    public function addCategory($payload);
}
