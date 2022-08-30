@extends('backend.main')

@section('medicallist-active', 'active')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Edit Medical List</b></h5>

                        <a href="{{ route('medical-lists.index') }}">
                            <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i><b>
                                    Back</b></button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                {{-- @include('template/message') --}}
                <form action="{{ route('medical-lists.update', $medical_list->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 m-0 text-end">Name:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="name"
                                                name="name" placeholder="Enter Name" value="{{ $medical_list->name }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="qty" class="col-sm-3 m-0 text-end">Quantity:</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control input-sm" id="total_qty"
                                                name="total_qty" placeholder="Enter Quantity"
                                                value="{{ $medical_list->total_qty }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="qty" class="col-sm-3 m-0 text-end">Total Quantity:</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control input-sm" id="qty"
                                                name="qty" placeholder="Enter Quantity"
                                                value="{{ $medical_list->total_qty }}" autocomplete="off" disabled>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-sm-3 m-0 text-end">Start Date:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control input-sm" id="start_date"
                                                name="start_date" placeholder="Enter Start Date"
                                                value="{{ $medical_list->start_date }}" autocomplete="off">
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
                                                    <option value="{{ $category->id }}"
                                                        @if ($medical_list->category_id == $category->id) selected @endif>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-3 m-0 text-end">Group:</label>
                                        <div class="col-sm-8">
                                            <select name="group_id" id="group_id" class="myselect form-control">
                                                <option>Select Option...</option>
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}"
                                                        @if ($medical_list->group_id == $group->id) selected @endif>
                                                        {{ $group->group }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="original_price" class="col-sm-3 m-0 text-end">Original Price:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="original_price"
                                                name="original_price" value="{{ $medical_list->original_price }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-3 m-0 text-end">Price:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control input-sm" id="price"
                                                name="price" placeholder="Enter Price"
                                                value="{{ $medical_list->price }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="expired_date" class="col-sm-3 m-0 text-end">Expired Date:</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control input-sm" id="expired_date"
                                                name="expired_date" value="{{ $medical_list->expired_date }}"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="photo" class="col-sm-3 m-0 text-end">Photo:</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control input-sm" id="photo"
                                                name="photo">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="sex" class="col-sm-3 m-0 text-end">Last Remaining:</label>
                                        <div class="col-sm-8">
                                            <input type="radio" name="last_remaining" id="Yes" value="Yes"
                                                @if ($medical_list->last_remaining == 'Yes') checked @endif>
                                            <label for="Yes">Yes</label> &nbsp;
                                            <input type="radio" name="last_remaining" id="No" value="No"
                                                @if ($medical_list->last_remaining == 'No' || $medical_list->last_remaining == '') checked @endif>
                                            <label for="No">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1">
                                    <div class="form-group row">
                                        <label for="note" class="col-sm-3 m-0 text-end">Note:</label>
                                        <div class="col-sm-8">
                                            <textarea name="note" id="note" cols="30" rows="1" class="form-control">{{ $medical_list->note }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 my-1 last"
                                    style="{{ $medical_list->last_remaining == 'No' ? 'display: none;' : '' }}">
                                    <div class="form-group row">
                                        <label for="last_remaining_qty" class="col-sm-3 m-0 text-end">Last Remaining
                                            Stock:</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control input-sm" id="last_remaining_qty"
                                                name="last_remaining_qty" placeholder="Enter Last Remaining Stock"
                                                value="{{ $medical_list->last_remaining_qty }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($medical_list_prices as $medical_list_price)
                                    <input type="hidden" name="medical_list_priceid[]"
                                        value="{{ $medical_list_price->id }}">


                                    <div class="col-sm-8 offset-sm-2 my-1">
                                        <div class="form-group row">
                                            <label for="price" class="col-sm-3 m-0 text-end">Price:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control input-sm" id="price"
                                                    name="price[]" placeholder="Enter Price"
                                                    value="{{ $medical_list_price->price }}" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6 my-1">
                                        <div class="form-group row">
                                            <label for="price" class="col-sm-3 m-0 text-end">Unit:</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control input-sm" id="unit_id"
                                                    name="unit_id[]" value="{{ $medical_list_price->unit }}"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div> --}}
                                @endforeach
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#Yes').on('click', function() {
                $('.last').slideDown(500);
            })
            $('#No').on('click', function() {
                $('#last_remaining_qty').val(0);
                $('.last').slideUp(500);
            })
        })
    </script>
@endsection
