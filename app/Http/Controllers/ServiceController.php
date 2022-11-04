<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceAttachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\IServices;

class ServiceController extends Controller
{
    protected IServices $service;

    public function __construct(IServices $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->service->getAllServices();
        return view('services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = $this->service->addService($request->except('files'));
//        return dd($service);
        if(count($request['files']) > 0)
        {
            if($request->hasFile('files'))
            {
                foreach ($request->file('files') as $key => $file)
                {
                    $attachment = new ServiceAttachment();
                    $attachment->service_id = $service->id;
                    $attachment->file = $this->uplaodFile($file);
                    $attachment->save();
                }
            }

        }

        return redirect()->back();
    }

    public function  uplaodFile($file)
    {
        $filenameWithExt = $file->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = str_replace(' ','_',$filename.'_'.time().'.'.$extension);
        // Upload Image
        $file->storeAs('public/images/services',$fileNameToStore);
        $path = 'storage/images/services/'.$fileNameToStore;
        return $path;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.detail',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('vendor.VendorEditService',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->update($request->all());
        if($request->file('files'))
        {
            ServiceAttachment::where('service_id','=',$service->id)->delete();
            foreach($request->file('files') as $file)
            {

                $attachment = new ServiceAttachment();
                $attachment->service_id = $service->id;
                $attachment->file = $this->uplaodFile($file);
                $attachment->save();
            }
        }

        return redirect()->route('vendorServices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back();
    }
}
