<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if(auth()->user()->hasRole('admin'))
        {
//            $vendors = User::role('vendor')->get();
            $vendors = User::get();
            return view('admin.Vendors',compact('vendors'));
        }
        return view('vendor.VendorDashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return auth()->user()->hasRole('vendor') ? view('vendor.VendorCreate') : view('admin.vendors');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|string',
                'payment_status' => 'required'
            ]
        );
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>  bcrypt($request->password),
                'email_verified_at' => $request->payment_status == 'with_payment' ? null : now()
            ]);
            return redirect()->back()->with('created','vendor created successfully');
        }catch (\Exception $e)
        {
            return redirect()->back()->with('error','Does not crate '.$e->getMessage());
        }

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
    public function edit(User $vendor)
    {
        return auth()->user()->hasRole('admin') ? view('admin.Vendors',compact('vendor')) : view('vendor.profile',compact('vendor'));
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
        try {
//            try {
//                $vendor = User::find($id);
//            }catch (\Exception $e)
//            {
//                return back()->with('error',$e->getMessage());
//            }

            $vendor->name = $request->name;
            $vendor->email = $request->email;
            $vendor->email_verified_at = $request->email_verified_at;
            $vendor->save();
            if(auth()->user()->hasRole('vendor'))
            {
                return back()->with('updated',$vendor->name.' has updated successfully');
            }
            return view('admin.vendors')->with('updated',$vendor->name.' has updated successfully');
        }catch (\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::find($id);
        try {
            $vendor = User::destroy($id);
            return view('admin.vendors')->with('deleted',$vendor.' vendor has deleted successfully');
        }catch (\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }

    public function services()
    {
        $services = $this->service->getAllServices();
        $categories = $this->category->getAllCategories();
        return view('vendor.VendorServices',compact('services','categories'));
    }

}
