@extends('layouts.dashboard')
@section('content-title','Dashboard')
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
    <div class="row">
        <div class="col-md-12">

            
            <div class="row"> <!-- row-start -->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <x-dashboard-card title="vendors" value="55" icon="icon-image/fact2.png" />
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <x-dashboard-card title="Services" value="15" icon="icon-image/service-icon1.png" />
                </div>
            </div> <!-- row-end -->
            
            <div class="row"> <!-- row-start -->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <x-dashboard-card title="Projects" value="10" icon="icon-image/service-icon5.png" />
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <x-dashboard-card title="Clients" value="15" icon="icon-image/seller.png" />
                </div>
            </div> <!-- row-end -->

        </div><!-- col end -->
    </div><!-- 1st row end-->

    <div class="gap-40"></div>
@endsection
