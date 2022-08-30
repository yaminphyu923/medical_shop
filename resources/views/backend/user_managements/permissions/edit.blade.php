@extends('backend.main')

@section('usermanagement-active', 'active')

@section('permission-active', 'active')

@section('list-title', 'Permission List')

@section('content')
    @include('backend.user_managements.head')

    <div class="col-sm-8 offset-sm-2">
        <div class="d-flex justify-content-end">

            <a href="{{ route('permissions.index') }}">
                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i><b>
                        Back</b></button>
            </a>
        </div>
        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card mt-3">

                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12 my-1 py-3">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 m-0 text-end">Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-sm" id="name" name="name"
                                        placeholder="Enter Name" value="{{ $permission->name }}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="reset" class="btn btn-warning btn-md"><i class="fas fa-redo"></i>
                        <b>Cancel</b></button>&nbsp;
                    <button type="submit" class="btn btn-primary btn-md"><i class="fas fa-clipboard-check"></i>
                        <b>Update</b></button>

                </div>

            </div>
        </form>
    </div>

@endsection
