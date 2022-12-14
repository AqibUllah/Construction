<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin']);
        // $this->middleware('auth');
    }

    public function index()
    {
        $vendors = User::whereHas('roles',function($q){
                        $q->where('name','vendor');
                    })->count();
        $clients = User::whereHas('roles',function($q){
                        $q->where('name','client');
                    })->count();
        $services = Service::count();
        return view('admin.AdminDashobard',compact('vendors','clients','services'));
    }

    public function vendors()
    {
        $vendors = User::with('roles')->get();
        return view('admin.vendors',compact('vendors'));
    }

    public function vendorCreate()
    {
        return view('admin.vendors');
    }

    public function Edit()
    {
        return view('Settings');
    }


    public function vendorDelete($id)
    {
        try {
            $vendor = User::destroy($id);
            $vendor->services->delete();
            return view('admin.vendors')->with('deleted',$vendor.' vendor has deleted successfully');
        }catch (\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }
    }


}
