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
                    <a class="bg-success" href="/admin/vendors">
                        <x-dashboard-card  title="vendors" :value="$vendors" icon="icon-image/fact2.png" />
                    </a>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <a href="/admin/services">
                        <x-dashboard-card title="Services" :value="$services" icon="icon-image/service-icon1.png" />
                    </a>
                </div>
            </div> <!-- row-end -->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-1">
                    <a href="/admin/clients">
                        <x-dashboard-card title="Clients" :value="$clients" icon="icon-image/seller.png" />
                    </a>
                </div>
            </div> <!-- row-end -->

        </div><!-- col end -->
    </div><!-- 1st row end-->

    <div class="gap-40"></div>
@endsection
