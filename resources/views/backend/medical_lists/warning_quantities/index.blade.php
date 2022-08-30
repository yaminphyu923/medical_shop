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
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i>
                                <b>Create</b></button>&nbsp;

                            <a href="{{ route('medical-lists.index') }}">
                                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i><b>
                                        Back</b></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('warning-quantities.store') }}" method="POST">
                @csrf
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Warning Quantity</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="yellow_warning" class="col-sm-5 m-0 text-end text-warning">Yellow Warning
                                        Quantity:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control input-sm" id="yellow_warning"
                                            name="yellow_warning" value="{{ old('yellow_warning') }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label for="red_warning" class="col-sm-5 m-0 text-end text-danger">Red Warning
                                        Quantity:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control input-sm" id="red_warning"
                                            name="red_warning" value="{{ old('red_warning') }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="datatable table table-strip table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="text-warning">Yellow Warning Quantity</th>
                                <th class="text-danger">Red Warning Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warning_quantities as $warning_quantity)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td class="text-warning"><b>{{ $warning_quantity->yellow_warning }}</b></td>
                                    <td class="text-danger"><b>{{ $warning_quantity->red_warning }}</b></td>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('warning-quantities.edit', $warning_quantity->id) }}">
                                            <button type="button" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i>
                                                Edit</button>
                                        </a>
                                        <form action="{{ route('warning-quantities.destroy', $warning_quantity->id) }}"
                                            method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-sm" type="submit"><i
                                                    class="fas fa-trash-alt"></i> Delete</button>
                                        </form>

                                        {{-- <button type="button" class="btn btn-sm btn-danger delete"
                                            id="{{ $warning_quantity->id }}"><i class="fas fa-trash"></i>
                                            Delete</button> --}}
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
                        url: '/warning-quantities/' + id,
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
