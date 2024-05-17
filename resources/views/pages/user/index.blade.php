@extends('layouts.app')

@section('title', 'Table')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User</h1>
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
                                <h4>Tabel user &nbsp; <a href="{{route('users.create')}}" class="btn btn-primary">Add User  </a></h4>
                                <div class="card-header-form">
                                    <form method="GET" action="{{route('users.index')}}">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                name="name"
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
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>Dummy</td>
                                            <td>Role Dummy</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a> &nbsp;
                                                    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="ml-2">
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                        <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i>Delete</button>
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
                                        {{$users->withQueryString()->links()}}
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
