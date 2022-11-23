<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use App\Repositories\Interfaces\IServices;
use App\Repositories\Interfaces\ICategory;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class VendorController extends Controller
{
    protected IServices $service;
    protected ICategory $category;

    public function __construct(IServices $service, ICategory $category)
    {
        $this->service = $service;
        $this->category = $category;


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.VendorDashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.VendorCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        //
    }

    public function services()
    {
        $services = $this->service->getAllServices();
        $categories = $this->category->getAllCategories();
        return view('vendor.VendorServices',compact('services','categories'));
    }

}
