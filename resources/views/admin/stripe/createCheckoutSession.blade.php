@extends('layouts.dashboard')
@section('content-title','Create Checkout Session')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('error'))
                <x-alert type="danger" title="Error" mssg="{{ session('error') }}" />
            @endif
            <form action="{{route('stripe.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="from" value="session">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="success_url">Success URL</label>
                            <input type="text" name="success_url" id="success_url" class="form-control form-control-sm" placeholder="http://localhost:8000/example">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cancel_url">Cancel URL</label>
                            <input type="text" name="cancel_url" id="cancel_url" class="form-control form-control-sm" placeholder="http://localhost:8000/example">
                        </div>
                    </div>
                </div>
                <fieldset class="border p-2">
                    <legend class="w-auto">mode price</legend>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mode">Mode</label>
                                <select name="mode" id="mode" class="form-control">
                                    <option value="payment">payment</option>
                                    <option value="subscription">subscription</option>
                                    <option value="setup">setup</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mode">Price</label>
                                <select name="price" id="price" class="form-control">
                                    @php
                                        $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
                                    @endphp
                                    @foreach($prices as $price)
                                        <option value="{{ $price->id }}">{{ $formatter->formatCurrency($price->unit_amount/100, $price->currency) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>
        </div><!-- col end -->
    </div><!-- 1st row end-->
    <div class="gap-40"></div>
@endsection
