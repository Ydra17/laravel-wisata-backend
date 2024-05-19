@extends('layouts.app')

@section('title', 'Categories')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tabel Products &nbsp; <a href="{{route('products.create')}}" class="btn btn-primary">Add Products  </a></h4>
                                <div class="card-header-form">
                                    <form method="GET" action="{{route('products.index')}}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                name="keyword"
                                                placeholder="Search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table-md table">
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Create At</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a> &nbsp;
                                                    <form action="{{route('products.destroy', $product->id)}}" method="POST" class="ml-2">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        {{$products->withQueryString()->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endpush
