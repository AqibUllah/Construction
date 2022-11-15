@extends('layouts.dashboard')
@section('content-title','Categories')
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
                <button type="button" class="btn btn-success float-right rounded-circle m-1" data-toggle="modal" data-target="#categoryModal">
                    <i class="fas fa-plus"></i>
                </button>
                <table id="example-1" class="table table-striped table-hover w-100">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($categories) > 0)
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{ $key+1  }}</td>
                                <td>{{ $category->category  }}</td>
                                <td>{{ $category->description }}</td>
                                <td class="justify-content-around d-flex text-center">
                                    <a href=""
                                        id="editCategory"
                                        data-id="{{ $category->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy',$category)  }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-danger border-0">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <h3 class="text-muted">No Categories Found!</h3>
                    @endif
                    </tbody>
                </table>
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
