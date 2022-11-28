<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin']);
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.AdminDashobard');
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

    public function vendorEdit($id)
    {
        $vendor = User::find($id);
        return view('admin.vendorsManage',compact('vendor'));
    }

    public function vendorUpdate($id, Request $request)
    {
        try {
            try {
                $vendor = User::find($id);
            }catch (\Exception $e)
            {
                return back()->with('error',$e->getMessage());
            }

            $vendor->name = $request->name;
            $vendor->email = $request->email;
            $vendor->email_verified_at = $request->email_verified_at;
            $vendor->save();
            return view('admin.vendors')->with('updated',$vendor->name.' has updated successfully');
        }catch (\Exception $e)
        {
            return back()->with('error',$e->getMessage());
        }

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
