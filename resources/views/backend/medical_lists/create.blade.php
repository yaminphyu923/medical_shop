@extends('backend.main')

@section('medicallist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Create Medical List</b></h5>

                        <a href="{{ route('medical-lists.index') }}">
                            <button type="button" class="btn btn-sm btn-info"><i class="fas fa-chevron-left"></i><b>
                                    Back</b></button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                {{-- @include('template/message') --}}
                <form action="{{ route('medical-lists.store') }}" method="POST">
                    @csrf

                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 m-0 text-end">Name:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="name"
                                                name="name" placeholder="Enter Name" value="{{ old('name') }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="qty" class="col-sm-3 m-0 text-end">Quantity:</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control input-sm" id="qty"
                                                name="qty" placeholder="Enter Quantity" value="{{ old('qty') }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-sm-3 m-0 text-end">Start Date:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control input-sm" id="start_date"
                                                name="start_date" placeholder="Enter Start Date"
                                                value="{{ old('start_date') }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-3 m-0 text-end">Category:</label>
                                        <div class="col-sm-8">
                                            <select name="category_id" id="category_id" class="myselect form-control">
                                                <option>Select Option...</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-3 m-0 text-end">Price:</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control input-sm" id="price"
                                                name="price" placeholder="Enter Price" value="{{ old('price') }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="expired_date" class="col-sm-3 m-0 text-end">Expired Date:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control input-sm" id="expired_date"
                                                name="expired_date" placeholder="Enter Expired Date"
                                                value="{{ old('expired_date') }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="sex" class="col-sm-3 m-0 text-end">Last Remaining:</label>
                                        <div class="col-sm-8">
                                            <input type="radio" name="last_remaining" id="Yes" value="Yes">
                                            <label for="Yes">Yes</label>&nbsp;
                                            <input type="radio" name="last_remaining" id="No" value="No">
                                            <label for="No">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="note" class="col-sm-3 m-0 text-end">Note:</label>
                                        <div class="col-sm-8">
                                            <textarea name="note" id="note" cols="30" rows="1" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1 last" style="display: none;">
                                    <div class="form-group row">
                                        <label for="last_remaining_qty" class="col-sm-3 m-0 text-end">Last Remaining
                                            Stock:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="last_remaining_qty"
                                                name="last_remaining_qty" placeholder="Enter Last Remaining Stock"
                                                value="{{ old('last_remaining_qty') }}" autocomplete="off">
                                        </div>
                                    </div>
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
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#Yes').on('click', function() {
                $('.last').slideDown(500);
            })
            $('#No').on('click', function() {
                $('.last').slideUp(500);
            })
        })
    </script>
@endsection
