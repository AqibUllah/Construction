@extends('layouts.dashboard')
@section('content-title','Billings')
@section('styles')
    <link rel="stylesheet" href="/assets/css/tabs.css">
    <style>
        .overflowTxt{
            overflow-x: hidden; /* Hide horizontal scrollbar */
            overflow-y: scroll; /* Add vertical scrollbar */
            max-width: 200px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tabs">

                <input type="radio" id="tab1" name="tab-control" checked>
                <input type="radio" id="tab2" name="tab-control">
                <input type="radio" id="tab3" name="tab-control">
                <input type="radio" id="tab4" name="tab-control">
                <ul>
                    <li title="products">
                        <label for="tab1" role="button">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M2.25,12.584c-0.713,0-1.292,0.578-1.292,1.291s0.579,1.291,1.292,1.291c0.713,0,1.292-0.578,1.292-1.291S2.963,12.584,2.25,12.584z M2.25,14.307c-0.238,0-0.43-0.193-0.43-0.432s0.192-0.432,0.43-0.432c0.238,0,0.431,0.193,0.431,0.432S2.488,14.307,2.25,14.307z M5.694,6.555H18.61c0.237,0,0.431-0.191,0.431-0.43s-0.193-0.431-0.431-0.431H5.694c-0.238,0-0.43,0.192-0.43,0.431S5.457,6.555,5.694,6.555z M2.25,8.708c-0.713,0-1.292,0.578-1.292,1.291c0,0.715,0.579,1.292,1.292,1.292c0.713,0,1.292-0.577,1.292-1.292C3.542,9.287,2.963,8.708,2.25,8.708z M2.25,10.43c-0.238,0-0.43-0.192-0.43-0.431c0-0.237,0.192-0.43,0.43-0.43c0.238,0,0.431,0.192,0.431,0.43C2.681,10.238,2.488,10.43,2.25,10.43z M18.61,9.57H5.694c-0.238,0-0.43,0.192-0.43,0.43c0,0.238,0.192,0.431,0.43,0.431H18.61c0.237,0,0.431-0.192,0.431-0.431C19.041,9.762,18.848,9.57,18.61,9.57z M18.61,13.443H5.694c-0.238,0-0.43,0.193-0.43,0.432s0.192,0.432,0.43,0.432H18.61c0.237,0,0.431-0.193,0.431-0.432S18.848,13.443,18.61,13.443z M2.25,4.833c-0.713,0-1.292,0.578-1.292,1.292c0,0.713,0.579,1.291,1.292,1.291c0.713,0,1.292-0.578,1.292-1.291C3.542,5.412,2.963,4.833,2.25,4.833z M2.25,6.555c-0.238,0-0.43-0.191-0.43-0.43s0.192-0.431,0.43-0.431c0.238,0,0.431,0.192,0.431,0.431S2.488,6.555,2.25,6.555z"></path>
                            </svg>
                            <br><span>Products</span>
                        </label>
                    </li>
                    <li title="prices">
                        <label for="tab2" role="button">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M11.088,2.542c0.063-0.146,0.103-0.306,0.103-0.476c0-0.657-0.534-1.19-1.19-1.19c-0.657,0-1.19,0.533-1.19,1.19c0,0.17,0.038,0.33,0.102,0.476c-4.085,0.535-7.243,4.021-7.243,8.252c0,4.601,3.73,8.332,8.332,8.332c4.601,0,8.331-3.73,8.331-8.332C18.331,6.562,15.173,3.076,11.088,2.542z M10,1.669c0.219,0,0.396,0.177,0.396,0.396S10.219,2.462,10,2.462c-0.22,0-0.397-0.177-0.397-0.396S9.78,1.669,10,1.669z M10,18.332c-4.163,0-7.538-3.375-7.538-7.539c0-4.163,3.375-7.538,7.538-7.538c4.162,0,7.538,3.375,7.538,7.538C17.538,14.957,14.162,18.332,10,18.332z M10.386,9.26c0.002-0.018,0.011-0.034,0.011-0.053V5.24c0-0.219-0.177-0.396-0.396-0.396c-0.22,0-0.397,0.177-0.397,0.396v3.967c0,0.019,0.008,0.035,0.011,0.053c-0.689,0.173-1.201,0.792-1.201,1.534c0,0.324,0.098,0.625,0.264,0.875c-0.079,0.014-0.155,0.043-0.216,0.104l-2.244,2.244c-0.155,0.154-0.155,0.406,0,0.561s0.406,0.154,0.561,0l2.244-2.242c0.061-0.062,0.091-0.139,0.104-0.217c0.251,0.166,0.551,0.264,0.875,0.264c0.876,0,1.587-0.711,1.587-1.587C11.587,10.052,11.075,9.433,10.386,9.26z M10,11.586c-0.438,0-0.793-0.354-0.793-0.792c0-0.438,0.355-0.792,0.793-0.792c0.438,0,0.793,0.355,0.793,0.792C10.793,11.232,10.438,11.586,10,11.586z"></path>
                            </svg>
                            <br><span>Prices</span>
                        </label>
                    </li>
                    <li title="sessions">
                        <label for="tab3" role="button">
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
                            </svg>
                            <br><span>Checkout Sessions</span></label></li>
                </ul>

                <div class="slider">
                    <div class="indicator"></div>
                </div>
                <div class="content">
                    <section>
                        @if(session('updated'))
                            <x-alert type="success" title="updated" mssg="{{ session('updated') }}" />
                        @endif
                        @if(session('created'))
                            <x-alert type="success" title="created" mssg="{{ session('created') }}" />
                        @endif
                        @if(session('error'))
                            <x-alert type="danger" title="Error" mssg="{{ session('error') }}" />
                        @endif
                        <a type="button" class="btn btn-success float-right btn-sm mb-1" href="{{ route('stripe.create',['name' => 'product']) }}">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                        <table id="example-1" class="table table-striped table-hover w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($products) > 0)
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ $key+1  }}</td>
                                        <td class="overflow-auto">{{ $product->name  }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td class="align-items-center {{ $product->active == true ? 'text-success' : 'text-danger' }}">
                                           <i title="{{ $product->active == true ? 'active' : 'disabled' }}" class="fas {{ $product->active == true ? 'fa-check-circle' : 'fa-close' }} fa-sm"></i>
                                        </td>
                                        <td class="d-flex justify-content-around">
                                            <a class="text-primary" href="/admin/stripe/{{ $product->id }}/edit?name=product">
                                                <i class="fas fa-pencil-alt" title="Edit"></i>
                                            </a>
                                            <form id="deleteForm" action="{{ route('stripe.destroy',$product->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="from" value="product">
                                                <a onclick="submitDeleteForm()" class="text-danger">
                                                    <i class="fas fa-trash-alt" title="Delete"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <span class="text-muted">No Products Found!</span>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </section>
                    <section>
                        <h2>prices</h2>
                        <a type="button" class="btn btn-success float-right btn-sm mb-1" href="{{ route('stripe.create',['name' => 'price']) }}">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                        <table id="example-1" class="table table-striped table-hover w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Currency</th>
                                <th>Interval</th>
                                <th>Amount</th>
{{--                                <th>Actions</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($prices) > 0)
                                    @foreach($prices as $key => $price)
                                        <tr>
                                        <td>{{ $key+1  }}</td>
                                        <td>{{ $price->currency  }}</td>
                                        @php
                                            $formatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
                                        @endphp
                                        <td>{{ $price->recurring ? $price->recurring['interval'] : '' }}</td>
                                        <td>{{ $formatter->formatCurrency($price->unit_amount/100, $price->currency)  }}</td>
    {{--                                    <td class="d-flex justify-content-around">--}}
    {{--                                        <a class="text-primary" href="/admin/stripe/{{ $price->id }}/edit?name=price">--}}
    {{--                                            <i class="fas fa-pencil-alt"></i>--}}
    {{--                                        </a>--}}
    {{--                                        <form id="deleteForm" action="{{ route('stripe.destroy',$price->id) }}" method="post">--}}
    {{--                                            @csrf--}}
    {{--                                            @method('delete')--}}
    {{--                                            <input type="hidden" name="from" value="price">--}}
    {{--                                            <a onclick="submitDeleteForm()" class="text-danger">--}}
    {{--                                                <i class="fas fa-trash-alt"></i>--}}
    {{--                                            </a>--}}
    {{--                                        </form>--}}
    {{--                                    </td>--}}
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <span class="text-muted">No Prices Found!</span>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </section>
                    <section>
                        <a type="button" class="btn btn-success float-right btn-sm mb-1" href="{{ route('stripe.create',['name' => 'session']) }}">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                        <table id="example-1" class="table table-striped table-hover w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>url</th>
                                <th>success url</th>
{{--                                <th>cancel url</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($checkoutSessions) > 0)
                                    @foreach($checkoutSessions as $key => $session)
                                        <tr>
                                            <td>{{ $key+1  }}</td>
                                            <td class="overflowTxt" data-toggle="tooltip" data-placement="top" title="{{ $session->url }}">
                                                {{ $session->url  }}
                                            </td>
                                            <td class="overflow-scroll">{{ $session->success_url }}</td>
    {{--                                        <td>{{ $session->cancel_url }}</td>--}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <span class="text-muted">No Sessions Found!</span>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </div><!-- col end -->
    </div><!-- 1st row end-->
@endsection
@section('scripts')
    <script>
        function submitDeleteForm()
        {
            document.getElementById("deleteForm").submit();
        }

    </script>
@endsection
