@extends('layouts.app')

@section('title', 'Add Categories')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Category {{$category->name}}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{route('categories.update', $category)}}">
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h4>Edit Category {{$category->name}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{$category->name}}"
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
                                        <input type="text" name="description" value="{{$category->description}}"
                                            class="form-control @error('description')
                                                is-invalid
                                            @enderror">
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
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
