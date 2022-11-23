@extends('layouts.app')
@section('title','payment cancel')
@section('content')
    <div class="container text-center my-5">
        <h2 class="text-danger">Payment Cancel</h2>
        <p>Without payment you  can't access your dashboard to managing your all of the services data</p>
        <p>Kindly pay subscribe monthly charges then you will be able to starts as a vendor with {{ \Illuminate\Support\Facades\App::getNamespace() }}</p>
        <center>
        <a href="/login" class="btn btn-success btn-block w-25">Go To Checkout</a>
        </center>
    </div>
@endsection
