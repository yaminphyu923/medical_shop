@extends('backend.main')

@section('usermanagement-active', 'active')

@section('user-active', 'active')

@section('list-title', 'User List')

@section('content')
    @include('backend.user_managements.head')

    <div class="col-sm-8 offset-sm-2">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('users.index') }}">
                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i><b>
                        Back</b></button>
            </a>
        </div>
    </div>

    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center py-2"><b>Detail User</b></h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-stripped table-hover">
                        <thead>
                            <tr>
                                <th><b>Name</b></th>
                                <th>:</th>
                                <th>{{ $user->name }}</th>

                            </tr>
                            <tr>
                                <th><b>Email</b></th>
                                <th>:</th>
                                <th>{{ $user->email }}</th>

                            </tr>
                            <tr>
                                <th><b>Role</b></th>
                                <th>:</th>
                                <th><span class="badge bg-success">{{ $userRole }}</span></th>

                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
