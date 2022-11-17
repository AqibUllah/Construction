@extends('layouts.app')
@section('title','Services')

@section('content')

<x-banner title="Services" />

<section id="main-container" class="main-container pb-2">
  <div class="container">
    <div class="row">
        @if(count($services) > 0)
            @foreach($services as $key => $service)
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" style="width: 100%;height: 200px;object-fit: cover" src="/{{$service->files[0]->file}}" alt="service-image">
                </div>
                <div class="d-flex">
                  <div class="ts-service-box-img">
                      @if($service->category == 4)
                          <img loading="lazy" src="/assets/images/icon-image/plumbing-64.png" alt="service-icon">
                      @elseif($service->category == 1)
                          <img loading="lazy" src="/assets/images/icon-image/residential-64.png" alt="service-icon">
                      @elseif($service->category == 2)
                          <img loading="lazy" src="/assets/images/icon-image/service-icon1.png" alt="service-icon">
                      @elseif($service->category == 3)
                          <img loading="lazy" src="/assets/images/icon-image/industrial-facilities-64.png" alt="service-icon">
                      @else
                          <img loading="lazy" src="/assets/images/icon-image/service-icon1.png" alt="service-icon">
                      @endif
                  </div>
                  <div class="ts-service-info">
                      <h3 class="service-box-title"><a href="service-single.html">{{ $service->title }}</a></h3>
                      <p>{{ $service->description }}.</p>
                      <a class="learn-more d-inline-block" href="{{ route('service.show', $service->id) }}" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                  </div>
                    <div class="float-right text-success">
                        <strong>per day ${{ $service->price }}</strong>
                    </div>
                </div>
            </div><!-- Service1 end -->
          </div><!-- Col 1 end -->
        @endforeach
        @else
            <div class="col-md-12">
                <h3 class="text-center text-muted">OOPS! No Services Found!</h3>
            </div>
        @endif
    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection
