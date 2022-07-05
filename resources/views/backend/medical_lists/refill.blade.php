@extends('backend.main')

@section('medicallist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Refill Stock</b></h5>

                        <a href="{{ route('medical-lists.index') }}">
                            <button type="button" class="btn btn-sm btn-info"><i class="fas fa-chevron-left"></i><b>
                                    Back</b></button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                {{-- @include('template/message') --}}
                <form action="{{ route('medical-lists.update', $medical_list->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 m-0 text-end">Name:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="name"
                                                name="name" placeholder="Enter Name" value="{{ $medical_list->name }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="qty" class="col-sm-3 m-0 text-end">Quantity:</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control input-sm" id="qty"
                                                name="qty" placeholder="Enter Quantity"
                                                value="{{ $medical_list->total_qty }}" autocomplete="off" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-sm-3 m-0 text-end">Start Date:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control input-sm" id="start_date"
                                                name="start_date" placeholder="Enter Start Date"
                                                value="{{ $medical_list->start_date }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-3 m-0 text-end">Category:</label>
                                        <div class="col-sm-8">
                                            <select name="category_id" id="category_id" class="myselect form-control">
                                                <option>Select Option...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($medical_list->category_id == $category->id) selected @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-3 m-0 text-end">Price:</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control input-sm" id="price"
                                                name="price" placeholder="Enter Price"
                                                value="{{ $medical_list->price }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="expired_date" class="col-sm-3 m-0 text-end">Expired Date:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control input-sm" id="expired_date"
                                                name="expired_date" placeholder="Enter Expired Date"
                                                value="{{ $medical_list->expired_date }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="note" class="col-sm-3 m-0 text-end">Note:</label>
                                        <div class="col-sm-8">
                                            <textarea name="note" id="note" cols="30" rows="1" class="form-control">{{ $medical_list->note }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="qty" class="col-sm-3 m-0 text-end">Refill Quantity:</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control input-sm" id="refill_qty"
                                                name="refill_qty" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 my-1">
                                    <div class="form-group row">
                                        <label for="expired_date" class="col-sm-3 m-0 text-end">Refill Expired
                                            Date:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control input-sm" id="refill_exp"
                                                name="refill_exp" placeholder="Enter Refill Expired Date"
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
                                <b>Refill</b></button>

                        </div>

                    </div>
                </form>


            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('refill', $medical_list->id) }}" method="GET">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for=""><b>From</b></label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="from_date"
                                            value="{{ request('from_date') }}">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for=""><b>To</b></label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" name="to_date"
                                            value="{{ request('to_date') }}">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <br>
                                    <button type="submit" class="btn btn-sm btn-info"><i class="fas fa-search"></i>
                                        Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive my-5">
                            <table class="datatable table table-strip table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Refill Quantity</th>
                                        <th>Refill Expired Date</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ $medicalList->qty <= 50 ? 'bg-warning' : '' }} --}}
                                    @foreach ($refills as $refill)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $refill->medicalList != null ? $refill->medicalList->name : '' }}</td>
                                            <td>{{ number_format($refill->refill_qty) }}</td>
                                            <td>{{ date('M-d-Y', strtotime($refill->refill_exp)) }}</td>

                                            {{-- <td>
                                                <a href="{{ route('medical-lists.edit', $refill->id) }}">
                                                    <button type="button" class="btn btn-sm btn-warning"><i
                                                            class="fas fa-edit"></i>
                                                        Edit</button>
                                                </a>

                                                <button type="button" class="btn btn-sm btn-danger delete"
                                                    id="{{ $refill->id }}"><i class="fas fa-trash"></i>
                                                    Delete</button>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
