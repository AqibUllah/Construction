@extends('layouts.dashboard')
@section('content-title','Edit Price')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('stripe.update',$price)}}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="from" value="price">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" value="{{ $price->unit_amount }}" class="form-control form-control-sm" placeholder="Unit Amount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <select name="currency" required id="currency" class="form-control">
                                <option disabled>select currency</option>
                                <option value="usd" {{ $price->currency == "usd" ?? 'selected' }}>usd</option>
                                <option value="pkr" {{ $price->currency == "pkr" ?? 'selected' }}>pkr</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select disabled required name="product_id" id="product_id" class="form-control">
                                <option disabled>select product</option>
                            @foreach($products as $key => $product)
                                    <option {{ $price->product == $product->id ?? 'selected' }} value="{{ $product->id }}">{{ $product->name }} -- {{ $product->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Package</label>
                        <br>
                        <div class="form-group justify-content-around">
                            <input type="radio" name="package" {{ $price->recurring && $price->recurring['interval'] == 'day' ? 'checked' : '' }} id="daily" class="" value="day">
                            <label for="daily">Daily</label>
                            <input type="radio" name="package" {{ $price->recurring && $price->recurring['interval'] == 'month' ? 'checked' : '' }} id="monthly" class="" value="month">
                            <label for="monthly">Monthly</label>
                            <input type="radio" name="package" {{ $price->recurring && $price->recurring['interval'] == 'year' ? 'checked' : '' }} id="yearly" class="" value="year">
                            <label for="yearly">Yearly</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div><!-- col end -->
    </div><!-- 1st row end-->
    <div class="gap-40"></div>
@endsection
