@extends('backend.main')

@section('medicallist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Units</b></h5>

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

            <form action="{{ route('units.store') }}" method="POST">
                @csrf
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Unit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="unit" class="col-sm-4 m-0 text-end">Unit:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control input-sm" id="unit" name="unit"
                                            value="{{ old('unit') }}" autocomplete="off">
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
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($units as $unit)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><b>{{ $unit->unit }}</b></td>
                                    <td>
                                        <a href="{{ route('units.edit', $unit->id) }}">
                                            <button type="button" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i>
                                                Edit</button>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger delete"
                                            id="{{ $unit->id }}"><i class="fas fa-trash"></i>
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
                        url: '/units/' + id,
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
