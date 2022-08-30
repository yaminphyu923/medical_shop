@extends('backend.main')

@section('medicallist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Medical List</b></h5>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('medical_list_export') }}"><button class="btn btn-sm btn-success"><i
                                        class="fas fa-file-excel"></i>
                                    <b>Excel
                                        Export</b></button></a>&nbsp;
                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#total"><i
                                    class="fas fa-file-excel"></i> <b>Excel
                                    Import</b></button>&nbsp;

                            <a href="{{ route('warning-quantities.index') }}">
                                <button type="button" class="btn btn-sm btn-success"><i
                                        class="fas fa-exclamation-circle"></i>
                                    <b>Warning Qty</b></button>&nbsp;
                            </a>
                            <a href="{{ route('categories.index') }}">
                                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i>
                                    <b>Category</b></button>&nbsp;
                            </a>
                            <a href="{{ route('groups.index') }}">
                                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i>
                                    <b>Group</b></button>&nbsp;
                            </a>
                            <a href="{{ route('medical-lists.create') }}">
                                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i><b>
                                        Create</b></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('medical_list_import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="total" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Excel File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3">File</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="file" id="file" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-md btn-default p-3" style="display:hidden;"></button>
                        <button class="btn btn-md btn-default p-3" style="display:hidden;"></button>
                    </div>
                    <label for=""><b>Sort by Name</b></label>
                    <div class="col-sm-12">
                        <a href="{{ route('sortByNameAsc') }}"><button class="btn btn-sm btn-info">ASC</button></a>
                        <a href="{{ route('sortByNameDesc') }}"><button class="btn btn-sm btn-info ml-1">DESC</button></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-md btn-warning p-3"></button>
                        <button class="btn btn-md btn-danger p-3"></button>
                    </div>
                    <label for=""><b>Sort by Qty</b></label>
                    <div class="col-sm-12">
                        <a href="{{ route('sortByQtyAsc') }}"><button class="btn btn-sm btn-info">ASC</button></a>
                        <a href="{{ route('sortByQtyDesc') }}"><button class="btn btn-sm btn-info ml-1">DESC</button></a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-2">
                <div class="form-group">
                    <label for=""><b>Sort by Price</b></label>
                    <div class="col-sm-12">
                        <a href="{{ route('sortByPriceAsc') }}"><button class="btn btn-sm btn-info">ASC</button></a>
                        <a href="{{ route('sortByPriceDesc') }}"><button
                                class="btn btn-sm btn-info ml-1">DESC</button></a>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-2">
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-md bg-yellow p-3"></button>
                        <button class="btn btn-md bg-red p-3"></button>
                    </div>
                    <label for=""><b>Sort by Expired Date</b></label>
                    <div class="col-sm-12">
                        <a href="{{ route('sortByExpAsc') }}"><button class="btn btn-sm btn-info">ASC</button></a>
                        <a href="{{ route('sortByExpDesc') }}"><button class="btn btn-sm btn-info ml-1">DESC</button></a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 m-0 p-0">
                <div class="form-group row">
                    <label for="" class="mt-2 col-sm-5 text-end m-0 p-0">Sort by Category:</label>
                    <div class="col-sm-6">
                        <select name="choose" id="choose" class="form-control">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == request()->choose) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 m-0 p-0">
                <div class="form-group row">
                    <label for="" class="mt-2 col-sm-5 text-end">Sort by Group:</label>
                    <div class="col-sm-6">
                        <select name="choose_group" id="choose-group" class="form-control">
                            <option value="">All</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" @if ($group->id == request()->choose_group) selected @endif>
                                    {{ $group->group }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="card py-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 m-0 p-0">
                                <form action="{{ route('medical-search-date') }}" method="GET">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="mt-2 col-sm-2 text-end m-0 p-0">From
                                            Date</label>
                                        <div class="col-sm-3 m-0 p-0">
                                            <input type="date" name="from_date" class="form-control"
                                                value="{{ request()->from_date }}">
                                        </div>
                                        <label for="" class="mt-2 col-sm-1 text-end p-0">To Date</label>
                                        <div class="col-sm-3 m-0 p-0">
                                            <input type="date" name="to_date" class="form-control"
                                                value="{{ request()->to_date }}">
                                        </div>
                                        <div class="col-sm-2 m-0 p-0">
                                            <button type="submit" class="btn btn-sm btn-primary"><i
                                                    class="fas fa-search"></i>
                                                Search</button>

                                            <a href="{{ route('medical-lists.index') }}"><button type="button"
                                                    class="btn btn-sm btn-primary"><i
                                                        class="fas fa-undo"></i></button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-1 m-0 p-0">
                                <a href="{{ route('today-search') }}">
                                    <button type="button" class="btn btn-sm btn-primary m-0 p-0">Today Drug</button>
                                </a>
                            </div>

                            <div class="col-sm-2 m-0 p-0">
                                <form action="{{ route('date-search') }}" method="GET">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-7 m-0 p-0">
                                            <input type="date" name="date" class="form-control"
                                                value="{{ request()->date }}">
                                        </div>

                                        <div class="col-sm-5 m-0 p-0">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                Search Date</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-sm-12 mt-3">
                <div class="table-responsive">
                    <table class="datatable table table-strip table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Start Date</th>
                                <th>Category</th>
                                <th>Original Price</th>
                                <th>Price</th>
                                <th>Expired Date</th>
                                <th>Last Remaining Stock</th>
                                <th>Photo</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ $medicalList->qty <= 50 ? 'bg-warning' : '' }} --}}
                            @foreach ($medicalLists as $medicalList)
                                <tr
                                    class="@if ($medicalList->total_qty <= $warning_quantity->yellow_warning &&
                                        $medicalList->total_qty > $warning_quantity->red_warning) bg-warning @elseif ($medicalList->total_qty <= $warning_quantity->red_warning) bg-danger @elseif ($medicalList->expired_date <= Carbon\Carbon::now()->addDays(10) &&
                                        $medicalList->expired_date > Carbon\Carbon::now()) bg-yellow @elseif($medicalList->expired_date < Carbon\Carbon::now()) bg-red @endif">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $medicalList->name }}</td>
                                    <td>{{ $medicalList->total_qty > 0 ? number_format($medicalList->total_qty) : '0' }}
                                    </td>
                                    <td>{{ date('M-d-Y', strtotime($medicalList->start_date)) }}</td>
                                    <td>{{ $medicalList->category != null ? $medicalList->category->name : '' }}</td>
                                    <td>{{ number_format((int) $medicalList->original_price) }}</td>
                                    <td>{{ number_format((int) $medicalList->price) }}</td>
                                    <td>{{ date('M-d-Y', strtotime($medicalList->expired_date)) }}</td>
                                    <td>{{ $medicalList->last_remaining_qty != null ? $medicalList->last_remaining_qty : '0' }}
                                    </td>
                                    <td>
                                        @if ($medicalList->photo)
                                            <img src="{{ asset('icons/stock_photos/' . $medicalList->photo) }}"
                                                alt="" class="img-thumbnail" style="width:70px;height:60px;">
                                        @else
                                            <p>No Photo</p>
                                        @endif
                                    </td>
                                    <td>{{ $medicalList->note }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            {{-- <a href="{{ route('refill', $medicalList->id) }}">
                                            <button type="button" class="btn btn-sm btn-info"><i
                                                    class="fas fa-plus-circle"></i>
                                                Refill</button>
                                        </a> --}}
                                            <a href="{{ route('medical-lists.edit', $medicalList->id) }}">
                                                <button type="button" class="btn btn-sm btn-warning"><i
                                                        class="fas fa-edit"></i>
                                                    Edit</button>
                                            </a>

                                            {{-- <button type="button" class="btn btn-sm btn-danger delete"
                                            id="{{ $medicalList->id }}"><i class="fas fa-trash"></i>
                                            Delete</button> --}}

                                            <form action="{{ route('medical-lists.destroy', $medicalList->id) }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger btn-sm" type="submit"><i
                                                        class="fas fa-trash-alt"></i> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            let id = this.id;

            Swal.fire({
                title: 'Are you sure, you want to delete?',
                showCancelButton: true,
                confirmButtonText: `Confirm`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/medical-lists/' + id,
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            location.reload();
                        }
                    });
                }
            })
        })

        $('#choose').change(function() {
            var choose = $('#choose').val();
            history.pushState(null, '', `?choose=${choose}`);
            window.location.reload();
        })

        $('#choose-group').change(function() {
            var choose_group = $('#choose-group').val();
            history.pushState(null, '', `?choose_group=${choose_group}`);
            window.location.reload();
        })
    </script>
@endsection
