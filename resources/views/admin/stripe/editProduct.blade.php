@extends('layouts.dashboard')
@section('content-title','Edit Product')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('stripe.update',$product->id)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="from" value="product">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" id="name" class="form-control form-control-sm" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" value="{{ $product->description }}" id="description" class="form-control form-control-sm" placeholder="Product Description">
                        </div>
                    </div>
                </div>
{{--                <label>Package</label>--}}
{{--                <br>--}}
{{--                <div class="form-group justify-content-around">--}}
{{--                    <input type="radio" name="package" id="daily" class="" value="daily">--}}
{{--                    <label for="daily">Daily</label>--}}
{{--                    <input type="radio" name="package" id="monthly" class="" value="monthly">--}}
{{--                    <label for="monthly">Monthly</label>--}}
{{--                    <input type="radio" name="package" id="yearly" class="" value="yearly">--}}
{{--                    <label for="daily">Yearly</label>--}}
{{--                </div>--}}
                <button type="submit" class="btn btn-outline-warning">Update</button>
            </form>
        </div><!-- col end -->
    </div><!-- 1st row end-->
    <div class="gap-40"></div>
@endsection
