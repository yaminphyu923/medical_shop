@extends('backend.main')

@section('usermanagement-active', 'active')

@section('role-active', 'active')

@section('list-title', 'Role List')

@section('content')
    @include('backend.user_managements.head')

    <div class="col-sm-8 offset-sm-2">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('roles.index') }}">
                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i><b>
                        Back</b></button>
            </a>
        </div>
    </div>

    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center py-2"><b>Detail Role</b></h4>
            </div>

            <div class="card-body">
                <div class="col-xs-6 offset-xs-3 col-sm-6 offset-sm-3 col-md-6 offset-md-3 my-3">
                    <strong class="text-warning">Name:</strong>
                    {{ $role->name }}
                </div>
                <div class="col-xs-6 offset-xs-3 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
                    <strong class="text-warning">Permissions:</strong>
                    <ol>
                        @if (!empty($rolePermissions))
                            @foreach ($rolePermissions as $v)
                                <li>{{ $v->name }}</li>
                            @endforeach
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
