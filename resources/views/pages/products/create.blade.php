@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add New Product</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="POST" enctype="multipart/form-data" action="{{route('products.store')}}">
                                @csrf
                                {{-- <div class="card-header">
                                    <h4>Add New Product</h4>
                                </div> --}}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{old('name')}}"
                                            class="form-control @error('name')
                                                is-invalid
                                            @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description" value="{{old('description')}}"
                                            class="form-control @error('description')
                                                is-invalid
                                            @enderror">
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" name="price" value="{{old('price')}}"
                                            class="form-control @error('price')
                                                is-invalid
                                            @enderror">
                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="text" name="stock" value="{{old('stock')}}"
                                            class="form-control @error('stock')
                                                is-invalid
                                            @enderror">
                                        @error('stock')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <select class="form-control selectric @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                            <option value="">Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Photo Product</label>
                                        <div class="col-sm-12">
                                            <input type="file" class="form-control" name="image"
                                                @error('image') is-invalid @enderror>
                                        </div>
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="draft" class="selectgroup-input"
                                                    checked="">
                                                <span class="selectgroup-button">Draft</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="published" class="selectgroup-input"
                                                    checked="">
                                                <span class="selectgroup-button">Published</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="archived" class="selectgroup-input">
                                                <span class="selectgroup-button">Archived</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Creteria</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="criteria" value="perorangan" class="selectgroup-input"
                                                    checked="">
                                                <span class="selectgroup-button">Perorangan</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="criteria" value="rombongan" class="selectgroup-input">
                                                <span class="selectgroup-button">Rombongan</span>
                                            </label>
                                        </div>
                                    </div>

                                    {{-- is favorite --}}
                                    <div class="form-group">
                                        <label class="form-label">Is Favorite</label>
                                        <div class="selectgroup selectgroup-pills">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="favorite" value="1" class="selectgroup-input"
                                                    checked="">
                                                <span class="selectgroup-button">Yes</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="favorite" value="0" class="selectgroup-input">
                                                <span class="selectgroup-button">No</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
