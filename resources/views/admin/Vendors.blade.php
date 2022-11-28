@extends('layouts.dashboard')
@section('content-title','Vendors')
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
                    <h1>{{ \Route::currentRouteName() }}</h1>
                @if(\Route::currentRouteName() == 'vendors.index' )
                    <a href="{{ route('vendors.create') }}" type="button" class="btn btn-success float-right rounded-circle m-1">
                        <i class="fas fa-plus"></i>
                    </a>
                    <table id="example-1" class="table table-striped table-hover w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email Verified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($vendors) > 0)
                        @foreach($vendors as $key => $vendor)
                            <tr>
                                <td>{{ $key+1  }}</td>
                                <td>{{ $vendor->name  }}</td>
                                <td>{{ $vendor->email }}</td>
                                <td>
                                    <span class="badge {{ $vendor->email_verified_at != null ? 'badge-success' : 'badge-danger' }}">{{ $vendor->email_verified_at != null ? 'Verified' : 'Not Verified' }}</span>
                                </td>
                                <td class="justify-content-around d-flex text-center">
                                    <a href="{{ route('vendors.edit', $vendor) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/admin/vendors/{{ $vendor->id }}" id="deleteFormId" method="post">
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
                        <h3 class="text-muted">No Categories Found!</h3>
                    @endif
                    </tbody>
                </table>
                @elseif(\Route::currentRouteName() == 'vendors.edit')
                        <form action="{{ route('vendors.update',$vendor->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{ $vendor->name }}" class="form-control @error('name') 'invalid-feedback' @enderror form-control-sm">
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
                                        <input type="text" name="email" value="{{ $vendor->email }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Select Payment Method</label>
                                        <select name="payment_status" class="form-control form-control-sm" id="payment_status">
                                            <option value="with_payment" {{ $vendor->email_verified_at !== null ? 'selected' : '' }}>With Payment</option>
                                            <option value="without_payment" {{ $vendor->email_verified_at == null ? 'selected' : '' }}>Without Payment</option>
                                        </select>
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
                @else
                    <form action="{{ route('vendors.store') }}" method="post">
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
                                    <input type="text" name="email" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Select Payment Method</label>
                                    <select name="payment_status" class="form-control form-control-sm" id="payment_status">
                                        <option value="with_payment">With Payment</option>
                                        <option value="without_payment">Without Payment</option>
                                    </select>
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





    <!-- basic modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Adding Service</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/categories/update" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="category_id" id="category_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" id="category" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" id="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('body').on('click', '#editCategory', function (event) {

            event.preventDefault();
            var id = $(this).data('id');
            console.log(id)
            $.get('categories/' + id + '/edit', function (data) {
                console.warn(data.data.category);
                $('#submit').val("Update Category");
                $('#category_id').val(data.data.id);
                $('#category').val(data.data.category);
                $('#description').val(data.data.description);
                $('#description').value = 'ddd';
                $('#editModal').modal('show');
                // data-toggle="modal"
                // data-target="#editModal"
            })
        });
    </script>
@endsection
