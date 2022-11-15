@extends('layouts.dashboard')
@section('content-title','Edit Category')
@section('styles')
    <link rel="stylesheet" href="/assets/css/tabs.css">
@endsection
@section('content')
    <div class="row mb-1">
        <div class="col-md-12">
            <div class="card shadow-lg p-3">
                    <form action="{{ route('categories.update',$category->id)  }}" method="post">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" name="category" id="category" value="{{ $category->category }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">
                            {{ $category->description }}
                        </textarea>
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
