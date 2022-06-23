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
        {{-- @include('template/message') --}}
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="card">
                <div class="card-body">

                    <div class="form-group row my-2">
                        <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Name</b></label>
                        <div class="col-sm-6 col-md-6">
                            <input type="text" name="name" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Email</b></label>
                        <div class="col-sm-6 col-md-6">
                            <input type="text" name="email" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row my-2">
                        <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Password</b></label>
                        <div class="col-sm-6 col-md-6">
                            <input type="password" name="password" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Confirm
                                Password</b></label>
                        <div class="col-sm-6 col-md-6">
                            <input type="password" name="confirm-password" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row my-2">
                        <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Role</b></label>
                        <div class="col-sm-6 col-md-6">
                            <select name="roles[]" id="roles" class="form-control">
                                <option>Select Option...</option>
                                @foreach ($roles as $key => $role)
                                    <option value="{{ $key }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
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
