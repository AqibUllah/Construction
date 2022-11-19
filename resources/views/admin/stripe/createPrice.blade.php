@extends('layouts.dashboard')
@section('content-title','Create Price')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('stripe.store')}}" method="post">
                @csrf
                <input type="hidden" name="from" value="price">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control form-control-sm" placeholder="Unit Amount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="usd">usd</option>
                                <option value="pkr">pkr</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select name="product_id" id="product_id" class="form-control">
                                @foreach($products as $key => $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} -- {{ $product->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Package</label>
                        <br>
                        <div class="form-group justify-content-around">
                            <input type="radio" name="package" id="daily" class="" value="day">
                            <label for="daily">Daily</label>
                            <input type="radio" name="package" id="monthly" class="" value="month">
                            <label for="monthly">Monthly</label>
                            <input type="radio" name="package" id="yearly" class="" value="year">
                            <label for="daily">Yearly</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div><!-- col end -->
    </div><!-- 1st row end-->
    <div class="gap-40"></div>
@endsection
