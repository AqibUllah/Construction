@extends('layouts.dashboard')
@section('content-title','Vendor Dashboard')
@section('styles')
<style>
    .card-icon img{
        height : 50px;
        width : 50px;
        color:yellow !important;
    }
</style>
@endsection
@section('content')
    <div class="row mb-1">
        <div class="col-md-6">
            <x-dashboard-card title="My Services" value="3" icon="icon-image/service-icon2.png" />
        </div><!-- col end -->
        <div class="col-md-6">
            <x-dashboard-card title="Active Services" value="3" icon="icon-image/back-in-time.png" />
        </div><!-- col end -->
    </div><!-- 1st row end-->

    <div class="row mb-1">
        <div class="col-md-6">
            <x-dashboard-card title="Completed" value="2" icon="icon-image/completed1.png" />
        </div><!-- col end -->
        <div class="col-md-6">
            <x-dashboard-card title="Cancelled" value="1" icon="icon-image/cancelled.png" />
        </div><!-- col end -->
    </div><!-- 1st row end-->

    <div class="gap-40"></div>
@endsection
