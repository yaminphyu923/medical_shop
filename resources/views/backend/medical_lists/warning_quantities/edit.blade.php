@extends('backend.main')

@section('medicallist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Warning Quantity</b></h5>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i>
                                <b>Create</b></button>&nbsp;

                            <a href="{{ route('medical-lists.index') }}">
                                <button type="button" class="btn btn-sm btn-info"><i class="fas fa-chevron-left"></i><b>
                                        Back</b></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 offset-sm-2">
                {{-- @include('template/message') --}}
                <form action="{{ route('warning-quantities.update', $warning_quantity->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="yellow_warning" class="col-sm-5 m-0 text-end text-warning">Yellow
                                            Warning
                                            Quantity:</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control input-sm" id="yellow_warning"
                                                name="yellow_warning" value="{{ $warning_quantity->yellow_warning }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row my-2">
                                        <label for="red_warning" class="col-sm-5 m-0 text-end text-danger">Red Warning
                                            Quantity:</label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control input-sm" id="red_warning"
                                                name="red_warning" value="{{ $warning_quantity->red_warning }}"
                                                autocomplete="off">
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
