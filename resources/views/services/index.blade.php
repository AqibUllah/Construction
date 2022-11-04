@extends('layouts.app')
@section('title','Services')

@section('content')

<x-banner title="Services" />

<section id="main-container" class="main-container pb-2">
  <div class="container">
    <div class="row">
        @foreach($services as $key => $service)
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" src="/{{$service->files[0]->file}}" alt="service-image">
                </div>
                <div class="d-flex">
                  <div class="ts-service-box-img">
                      <img loading="lazy" src="/assets/images/icon-image/service-icon1.png" alt="service-icon">
                  </div>
                  <div class="ts-service-info">
                      <h3 class="service-box-title"><a href="service-single.html">{{ $service->title }}</a></h3>
                      <p>{{ $service->description }}.</p>
                      <a class="learn-more d-inline-block" href="{{ route('service.show', $service->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                  </div>
                </div>
            </div><!-- Service1 end -->
          </div><!-- Col 1 end -->
        @endforeach
    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection
