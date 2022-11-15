@extends('layouts.dashboard')
@section('content-title','Edit Service')
@section('styles')
    <link rel="stylesheet" href="/assets/css/tabs.css">
@endsection
@section('content')
    <div class="row mb-1">
        <div class="col-md-12">
            <div class="card shadow-lg p-3">
                    <form action="{{ route('service.update',$service->id)  }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $service->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Description</label>
                        <textarea name="description" id="description" class="form-control">
                            {{ $service->description }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option disabled>Select Category</option>
                            @foreach($categories as $key => $category)
                                <option value="{{ $category->id }}" {{ $category->id == $service->category ? 'selected' : '' }}>{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <label for="title">Price / Day <span class="text-danger">* Note enter price base on per day</span></label>
                                <div class="left-inner-addon">
                                    <span>$</span>
                                    <input type="text" name="price" id="price" placeholder="0.00" value="{{ $service->price }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <label for="title">Choose File</label>
                                <input type="file" name="files[]" multiple id="files" value="{{ $service->file }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="float-right">
                            <a href="{{ \URL::previous() }}" class="btn btn-danger" type="button">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- col end -->
    </div><!-- 1st row end-->

    <div class="gap-40"></div>
@endsection
