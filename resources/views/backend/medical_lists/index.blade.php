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
                            <a href="{{ route('warning-quantities.index') }}">
                                <button type="button" class="btn btn-sm btn-info"><i class="fas fa-exclamation-circle"></i>
                                    <b>Warning Qty</b></button>&nbsp;
                            </a>
                            <a href="{{ route('categories.index') }}">
                                <button type="button" class="btn btn-sm btn-info"><i class="fas fa-plus-circle"></i>
                                    <b>Category</b></button>&nbsp;
                            </a>
                            <a href="{{ route('medical-lists.create') }}">
                                <button type="button" class="btn btn-sm btn-info"><i class="fas fa-plus-circle"></i><b>
                                        Create</b></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="datatable table table-strip table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Start Date</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Expired Date</th>
                                <th>Last Remaining Stock</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- {{ $medicalList->qty <= 50 ? 'bg-warning' : '' }} --}}
                            @foreach ($medicalLists as $medicalList)
                                <tr
                                    class="@if ($medicalList->qty <= $warning_quantity->yellow_warning && $medicalList->qty > $warning_quantity->red_warning) bg-warning @elseif ($medicalList->qty <= $warning_quantity->red_warning) bg-danger @endif">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $medicalList->name }}</td>
                                    <td>{{ number_format($medicalList->qty) }}</td>
                                    <td>{{ $medicalList->start_date }}</td>
                                    <td>{{ $medicalList->category != null ? $medicalList->category->name : '' }}</td>
                                    <td>{{ number_format($medicalList->price) }}</td>
                                    <td>{{ $medicalList->expired_date }}</td>
                                    <td>{{ $medicalList->last_remaining_qty != null ? $medicalList->last_remaining_qty : '0' }}
                                    </td>
                                    <td>{{ $medicalList->note }}</td>
                                    <td>
                                        <a href="{{ route('refill', $medicalList->id) }}">
                                            <button type="button" class="btn btn-sm btn-info"><i
                                                    class="fas fa-plus-circle"></i>
                                                Refill</button>
                                        </a>
                                        <a href="{{ route('medical-lists.edit', $medicalList->id) }}">
                                            <button type="button" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i>
                                                Edit</button>
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger delete"
                                            id="{{ $medicalList->id }}"><i class="fas fa-trash"></i>
                                            Delete</button>
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
    </script>
@endsection
