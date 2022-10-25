<?php

namespace App\Repositories\Services;

use App\Repositories\Interfaces\IServices;
use App\Models\Service;
class OurServices implements IServices {

    public function getAllServices()
    {
        return Service::all();
    }
}