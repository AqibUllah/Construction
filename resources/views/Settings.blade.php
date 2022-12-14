@extends('layouts.dashboard')
@section('content-title','Settings')
@section('styles')
    <link rel="stylesheet" href="/assets/css/tabs.css">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="shadow-lg px-3">
                @if(session('updated'))
                    <x-alert type="success" title="updated" mssg="{{ session('updated') }}" />
                @endif
                @if(session('created'))
                    <x-alert type="success" title="created" mssg="{{ session('created') }}" />
                @endif
                @if(session('deleted'))
                    <x-alert type="primary" title="deleted" mssg="{{ session('deleted') }}" />
                @endif
                @if(session('error'))
                    <x-alert type="danger" title="Error!" mssg="{{ session('error') }}" />
                @endif
                <form
{{--                    adminProfileEdit--}}
                    action="{{ route(\Route::currentRouteName()) }}"
                    method="post" autocomplete="off">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="user_id" value="{{ \Auth::id() }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control @error('name') 'invalid-feedback' @enderror form-control-sm">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="{{ auth()->user()->email }}" class="form-control @error('email') 'invalid-feedback' @enderror form-control-sm">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Phone #</label>
                                        <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="form-control @error('phone') 'invalid-feedback' @enderror form-control-sm">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Address</label>
                                        <input type="text" name="address" value="{{ auth()->user()->address }}" class="form-control @error('address') 'invalid-feedback' @enderror form-control-sm" >
                                        @error('address')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') 'invalid-feedback' @enderror form-control-sm">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm password</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') 'invalid-feedback' @enderror form-control-sm">
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            <span>{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                        </form>

            </div>
        </div><!-- col end -->
    </div><!-- 1st row end-->
    <div class="gap-40"></div>
@endsection
