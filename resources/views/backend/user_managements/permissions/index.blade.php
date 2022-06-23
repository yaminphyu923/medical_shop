@extends('backend.main')

@section('usermanagement-active', 'active')

@section('permission-active', 'active')

@section('list-title', 'Permission List')

@section('content')
    @include('backend.user_managements.head')

    <div class="col-sm-11 mb-3">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class="fas fa-plus-circle"></i> <b>Create</b></button>
        </div>
    </div>

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-5 m-0 text-end">Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control input-sm" id="name" name="name"
                                    value="{{ old('name') }}" autocomplete="off">
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
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('permissions.edit', $permission->id) }}">
                                    <button type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>
                                        Edit</button>
                                </a>

                                <button type="button" class="btn btn-sm btn-danger delete" id="{{ $permission->id }}"><i
                                        class="fas fa-trash"></i>
                                    Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                        url: '/permissions/' + id,
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
