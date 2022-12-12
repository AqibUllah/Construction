<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ICategory;


class CategoryController extends Controller
{
    protected ICategory $category;
    public function __construct(ICategory $category)
    {
        $this->category = $category;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->getAllCategories();
        return view('admin.Categories',compact('categories'));
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
        $category = $this->category->addCategory($request->all());
        return redirect()->back()->with('created',$category->category.' category has created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $cetegory
     * @return \Illuminate\Http\Response
     */
    public function show(Category $cetegory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response()->json(['status' => true,'data' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $cetegory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $cetegory)
    {
        $category = Category::find($request->edit_id);
        $category->category = $request->category;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('categories.index')->with('updated',$category->catetgory.' has updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('deleted',$category->category.' has deleted successfully');
    }
}
