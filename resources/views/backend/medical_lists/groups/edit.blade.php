@extends('backend.main')

@section('medicallist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-2">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Edit Group</b></h5>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('groups.index') }}">
                                <button type="button" class="btn btn-sm btn-info"><i class="fas fa-chevron-left"></i><b>
                                        Back</b></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 offset-sm-2">
                {{-- @include('template/message') --}}
                <form action="{{ route('groups.update', $group->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">

                        <div class="card-body">

                            <div class="row py-3">
                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="unit" class="col-sm-4 m-0 text-end">Group:</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control input-sm" id="group"
                                                name="group" value="{{ $group->group }}" autocomplete="off">
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

        </div>
    </div>
@endsection
