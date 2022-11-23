@extends('layouts.app')
@section('title','payment cancel')
@section('content')
    <div class="container text-center my-5">
        <span class="fas fa-check-circle fa-3x text-success"></span>
        <h2 class="text-success">Payment was successful</h2>
        <p>Now you can starts as a vendor and create your services </p>
        <center>
        <a href="/vendor/dashboard" class="btn btn-success btn-block w-25">Go To Dashboard</a>
        </center>
    </div>
@endsection
