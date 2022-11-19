@extends('layouts.dashboard')
@section('content-title','Create Product')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('stripe.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="from" value="product">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control form-control-sm" placeholder="Product Description">
                        </div>
                    </div>
                </div>
                <fieldset class="border p-2">
                    <legend class="w-auto">default price area</legend>
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
                </fieldset>
                <fieldset class="border p-2">
                    <legend class="w-auto">Recurring</legend>
                    <br>
                    <div class="form-group justify-content-around d-flex">
                        <div class="form-check">
                            <input type="radio" name="package" id="daily" class="form-check-input" value="day">
                            <label for="daily" class="form-check-label">Daily</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="package" id="monthly" class="form-check-input" value="month">
                            <label for="monthly"  class="form-check-label">Monthly</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="package" id="yearly" class="form-check-input" value="year">
                            <label for="yearly"  class="form-check-label">Yearly</label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="border p-2 mb-2">
                    <legend class="w-auto">Images</legend>
                    <div class="form-group justify-content-around d-flex">
                        <div class="form-check">
                            <input type="file" multiple name="images[]" id="images">
                        </div>
                    </div>
                </fieldset>

                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div><!-- col end -->
    </div><!-- 1st row end-->
    <div class="gap-40"></div>
@endsection
