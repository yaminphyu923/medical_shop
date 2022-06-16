@extends('backend.main')

@section('customer-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Edit Cutomer</b></h5>

                        <a href="{{ route('customers.index') }}">
                            <button type="button" class="btn btn-sm btn-info"><i class="fas fa-chevron-left"></i><b>
                                    Back</b></button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                {{-- @include('template/message') --}}
                <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 m-0 text-end">Name:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="name" name="name"
                                                placeholder="Enter Name" value="{{ $customer->name }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 m-0 text-end">Phone:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="phone" name="phone"
                                                placeholder="Enter Phone" value="{{ $customer->phone }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="nrc" class="col-sm-3 m-0 text-end">NRC:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="nrc" name="nrc"
                                                placeholder="Enter NRC" value="{{ $customer->nrc }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 m-0 text-end">Email:</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control input-sm" id="email" name="email"
                                                placeholder="Enter Email" value="{{ $customer->email }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="age" class="col-sm-3 m-0 text-end">Age:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="age" name="age"
                                                placeholder="Enter Age" value="{{ $customer->age }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="sex" class="col-sm-3 m-0 text-end">Sex:</label>
                                        <div class="col-sm-8">
                                            <input type="radio" name="sex" id="male" value="Male"
                                                @if ('Male' == $customer->sex) checked @endif>
                                            <label for="male">Male</label>
                                            <input type="radio" name="sex" id="female" value="Female"
                                                @if ('Female' == $customer->sex) checked @endif>
                                            <label for="female">Female</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 m-0 text-end">Address:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="address" name="address"
                                                placeholder="Enter Address" value="{{ $customer->address }}"
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
