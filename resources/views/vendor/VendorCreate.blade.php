@extends('layouts.app')
@section('title','Join as a Vendor')

@section('content')
<section id="main-container" class="main-container">
   <div class="container">
      <div class="row text-center">
         <div class="col-12">
            <h3 class="section-sub-title mb-4">Join as a Vendor</h3>
         </div>
      </div>
      <!--/ Title row end -->
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">{{ __('Register as a vendor') }}</div>
                   <div class="card-body">
                       <form method="POST" action="{{ route('register') }}">
                           @csrf

                           <div class="row mb-3">
                               <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                               <div class="col-md-6">
                                   <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                   @error('name')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                           </div>

                           <div class="row mb-3">
                               <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                               <div class="col-md-6">
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                   @error('email')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                           </div>

                           <div class="row mb-3">
                               <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                               <div class="col-md-6">
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                   @error('password')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                           </div>

                           <div class="row mb-3">
                               <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                               <div class="col-md-6">
                                   <select disabled class="form-control @error('role') is-invalid @enderror" name="role" id="role" required autocomplete="role">
                                       <option value="vendor">Vendor</option>
                                   </select>
                                   @error('role')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                           </div>

                           <div class="row mb-3">
                               <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                               <div class="col-md-6">
                                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                               </div>
                           </div>

                           <div class="row mb-0">
                               <div class="col-md-6 offset-md-4">
                                   <button type="submit" class="btn btn-primary">
                                       {{ __('Register') }}
                                   </button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
      <!-- vendor-form-here -->

   </div><!-- Container end -->
</section><!-- Main container end -->
@endsection
