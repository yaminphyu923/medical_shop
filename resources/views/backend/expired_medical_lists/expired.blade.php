@extends('backend.main')

@section('expired-medicallist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Medical List</b></h5>
                    </div>
                </div>
            </div>

            {{-- <div class="col-sm-4">
                <div class="form-group row">
                    <label for="" class="mt-2 col-sm-4 text-end">Choose:</label>
                    <div class="col-sm-7">
                        <select name="choose" id="choose" class="form-control">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == request()->choose) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div> --}}

            <div class="col-sm-2">
                <div class="form-group">
                    <label for=""><b>Sort by Expired Date</b></label>
                    <div class="col-sm-12">
                        <a href="{{ route('sortByExpListAsc') }}"><button class="btn btn-sm btn-info">ASC</button></a>
                        <a href="{{ route('sortByExpListDesc') }}"><button
                                class="btn btn-sm btn-info ml-1">DESC</button></a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3">
                <div class="table-responsive">
                    <table class="datatable table table-strip table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Total Quantity</th>
                                <th>Start Date</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Expired Date</th>
                                <th>Last Remaining Stock</th>
                                <th>Photo</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ $medicalList->qty <= 50 ? 'bg-warning' : '' }} --}}
                            @foreach ($expired_lists as $expired_list)
                                <tr
                                    class="@if ($expired_list->expired_date <= Carbon\Carbon::now()->addDays(10) && $expired_list->expired_date > Carbon\Carbon::now()) bg-yellow @elseif($expired_list->expired_date < Carbon\Carbon::now()) bg-red @endif">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $expired_list->name }}</td>
                                    <td>{{ number_format($expired_list->total_qty) }}</td>
                                    <td>{{ date('M-d-Y', strtotime($expired_list->start_date)) }}</td>
                                    <td>{{ $expired_list->category != null ? $expired_list->category->name : '' }}</td>
                                    <td></td>
                                    {{-- <td>{{ number_format($medicalList->price) }}</td> --}}
                                    <td>{{ date('M-d-Y', strtotime($expired_list->expired_date)) }}</td>
                                    <td>{{ $expired_list->last_remaining_qty != null ? $expired_list->last_remaining_qty : '0' }}
                                    </td>
                                    <td>
                                        @if ($expired_list->photo)
                                            <img src="{{ asset('icons/stock_photos/' . $expired_list->photo) }}"
                                                alt="" class="img-thumbnail" style="width:70px;height:60px;">
                                        @else
                                            <p>No Photo</p>
                                        @endif
                                    </td>
                                    <td>{{ $expired_list->note }}</td>

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
    </script>
@endsection
