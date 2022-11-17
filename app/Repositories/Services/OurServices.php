<?php

namespace App\Repositories\Services;

use App\Repositories\Interfaces\IServices;
use App\Models\Service;
use Illuminate\Http\Request;

class OurServices implements IServices {

    public function getAllServices()
    {
        return Service::with('files')->paginate(10);
    }

    public function addService($payload)
    {
        $service = Service::create([
            'user_id' => auth()->user()->id,
            'title' => $payload['title'],
            'description' => $payload['description'],
            'category' => $payload['category'],
            'price' => $payload['price'],
            'IsAvailable' => 1,
            'IsDeleted' => 0,

        ]);
        return $service;
    }

    public function getLatest(int $numbr)
    {
        return Service::latest()->take($numbr)->get();
    }
}
