<?php

namespace App\Http\Controllers;

use App\Http\Requests\serviceRequest;
use App\Models\Service;
use App\Models\ServiceAttachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\IServices;
use App\Repositories\Interfaces\ICategory;


class ServiceController extends Controller
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
     * @param  \Illuminate\Http\serviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(serviceRequest $request)
    {
        $validated = $request->validated();
        $service = $this->service->addService($request->except('files'));
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
        return redirect()->back()->with('created',$service->title.' Service has been created successfully');
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
        $categories = $this->category->getAllCategories();
        return view('vendor.VendorEditService',compact('service','categories'));
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

        return redirect()->route('vendorServices')->with('updated','Service has been updated successfully');
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
