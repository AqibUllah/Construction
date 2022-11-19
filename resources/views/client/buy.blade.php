@extends('layouts.app')
@section('title','Services')
@section('content')
    <x-banner title="Get Service"/>
    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar sidebar-left">
                        <div class="widget">
                            <h3 class="widget-title">client</h3>
{{--                            <ul class="nav service-menu">--}}
{{--                                <li><a href="service-single.html">Home Construction</a></li>--}}
{{--                                <li class="active"><a href="service-single.html">Building Remodels</a></li>--}}
{{--                                <li><a href="#">Interior Design</a></li>--}}
{{--                                <li><a href="#">Exterior Design</a></li>--}}
{{--                                <li><a href="#">Renovation</a></li>--}}
{{--                                <li><a href="#">Safety Management</a></li>--}}
{{--                            </ul>--}}
                        </div><!-- Widget end -->

                        <div class="widget">
                            <div class="quote-item quote-border">
                                <div class="quote-text-border">
                                    connecting with a service whoes created by
                                </div>

                                <div class="quote-item-footer">
                                    <img loading="lazy" class="testimonial-thumb"
                                         src="/assets/images/clients/testimonial1.png" alt="testimonial">
                                    <div class="quote-item-info">
                                        <h3 class="quote-author">{{ $service->user->name }}</h3>
                                        <span class="quote-subtext">CEO, First Choice Group</span>
                                    </div>
                                </div>
                            </div><!-- Quote item end -->

                        </div><!-- Widget end -->

                    </div><!-- Sidebar end -->
                </div><!-- Sidebar Col end -->

                <div class="col-xl-8 col-lg-8">
                    <div class="content-inner-page">

                              <div class="row">
                                  <div class="col-md-12">
                                      <form action="#" method="post">
                                          @csrf
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group input-group-sm">
                                                      <label for="name">Name</label>
                                                      <input type="text" name="name" id="name" class="form-control" value="{{ \Auth::user()->name }}" disabled>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group input-group-sm">
                                                      <label for="email">Email</label>
                                                      <input type="text" name="email" id="email" class="form-control" value="{{ \Auth::user()->email }}" disabled>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group input-group-sm">
                                                      <label for="phone">Phone</label>
                                                      <input type="text" name="phone" id="phone" class="form-control" value="{{ \Auth::user()->phone }}">
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group input-group-sm">
                                                      <label for="address">Address</label>
                                                      <input type="text" name="address" id="address" class="form-control" value="{{ \Auth::user()->address }}">
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group input-group-sm">
                                                      <label for="country">Country</label>
                                                      <input type="text" name="country" id="country" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="col-md-4">
                                                  <div class="form-group input-group-sm">
                                                      <label for="city">City</label>
                                                      <input type="text" name="city" id="city" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="col-md-4">
                                                  <div class="form-group input-group-sm">
                                                      <label for="postcode">Postal Code</label>
                                                      <input type="text" name="postcode" id="postcode" class="form-control">
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                    <!--2nd row end -->
                        <div class="gap-40"></div>

                        <div class="call-to-action classic">
                            <div class="row align-items-center">
                                <div class="col-md-8 text-center text-md-left">
                                    <div class="call-to-action-text">
                                        <h3 class="action-title">All Done.</h3>
                                    </div>
                                </div><!-- Col end -->
                                <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                                    <div class="call-to-action-btn">
                                        <a class="btn btn-primary" href="/contact">Go To Checkout Page</a>
                                    </div>
                                </div><!-- col end -->
                            </div><!-- row end -->
                        </div><!-- Action end -->

                    </div><!-- Content inner end -->
                </div><!-- Content Col end -->


            </div><!-- Main row end -->
        </div><!-- Conatiner end -->
    </section><!-- Main container end -->

@endsection
