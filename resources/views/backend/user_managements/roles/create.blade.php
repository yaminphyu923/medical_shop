@extends('backend.main')

@section('usermanagement-active', 'active')

@section('role-active', 'active')

@section('list-title', 'Role List')

@section('content')
    @include('backend.user_managements.head')

    <div class="col-sm-10 offset-sm-1">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('roles.index') }}">
                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i><b>
                        Back</b></button>
            </a>
        </div>
        {{-- @include('template/message') --}}
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="card-body">

                    <div class="form-group row offset-sm-1 mt-5">
                        <label for="name" class="col-sm-2">Name :</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row mt-3 px-3">
                        <label for="" class="col-sm-12"><b>Permission</b></label>
                        @foreach ($permissions as $permission)
                            <div class="col-sm-3">
                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}">
                                <label for="" class="ml-2 mr-3">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-center">
                    <button type="reset" class="btn btn-warning btn-md"><i class="fas fa-redo"></i>
                        <b>Cancel</b></button>&nbsp;
                    <button type="submit" class="btn btn-primary btn-md"><i class="fas fa-clipboard-check"></i>
                        <b>Save</b></button>

                </div>
            </div>
        </form>
    </div>
@endsection
