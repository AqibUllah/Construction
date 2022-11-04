<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface IServices {
    public function getAllServices();
    public function addService($payload);
}
