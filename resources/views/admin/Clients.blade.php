@extends('layouts.dashboard')
@section('content-title','Clients')
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
                @if(\Route::currentRouteName() == 'clients.index' )
                    <a href="{{ route('clients.create') }}" type="button" class="btn btn-success float-right rounded-circle m-1">
                        <i class="fas fa-plus"></i>
                    </a>
                    <table id="example-1" class="table table-striped table-hover w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($clients) > 0)
                        @foreach($clients as $key => $client)
                            <tr>
                                <td>{{ $key+1  }}</td>
                                <td>{{ $client->name  }}</td>
                                <td>{{ $client->email }}</td>
                                <td>
                                    <span class="badge 'badge-info' }}">{{ $client->phone }}</span>
                                </td>
                                <td>{{ $client->address }}</td>
                                <td class="justify-content-around d-flex text-center">
                                    <a href="{{ route('clients.edit', $client) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" id="deleteFormId" method="post">
                                        @method('delete')
                                        @csrf
                                        <a type="button" onclick="document.getElementById('deleteFormId').submit()">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 class="text-muted">No Clients Found!</h3>
                    @endif
                    </tbody>
                </table>
                @elseif(\Route::currentRouteName() == 'clients.edit')
{{--                        {{ route('vendors.update',$vendor->id) }}--}}
                        <form action="{{ route('clients.update', $client) }}" method="post" autocomplete="off">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $client->name }}" class="form-control @error('name') 'invalid-feedback' @enderror form-control-sm">
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
                                        <input type="text" name="email" value="{{ $client->email }}" class="form-control @error('email') 'invalid-feedback' @enderror form-control-sm">
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
                                        <input type="text" name="phone" value="{{ $client->phone }}" class="form-control @error('phone') 'invalid-feedback' @enderror form-control-sm">
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
                                        <input type="text" name="address" class="form-control @error('address') 'invalid-feedback' @enderror form-control-sm" >
                                            {{ $client->address }}
                                        </input>
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
                @else
                    <form action="{{ route('clients.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') 'invalid-feedback' @enderror form-control-sm">
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
                                    <input type="text" name="email" autocomplete="false" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Phone #</label>
                                    <input type="text" name="phone" class="form-control @error('phone') 'invalid-feedback' @enderror form-control-sm">
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
                                    <input type="text"  rows="4" cols="50" name="address" class="form-control @error('address') 'invalid-feedback' @enderror form-control-sm">
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
                                    <input type="password" name="password" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm password</label>
                                    <input type="password" name="password_confirmation" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div><!-- col end -->
    </div><!-- 1st row end-->
    <div class="gap-40"></div>
@endsection
