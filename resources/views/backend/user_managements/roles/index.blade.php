@extends('backend.main')

@section('usermanagement-active', 'active')

@section('role-active', 'active')

@section('list-title', 'Role List')

@section('content')
    @include('backend.user_managements.head')

    <div class="col-sm-12">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('roles.create') }}">
                <button type="button" class="btn btn-md btn-primary"><i class="fas fa-plus-circle"></i>
                    <b>Create Role</b></button>
            </a>
        </div>

        <div class="table-responsive">
            <table class="datatable table table-stripped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>

                            <td>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('roles.show', $role->id) }}"><button type="button"
                                            class="btn btn-sm btn-primary py-2"><i class="fas fa-eye"></i>
                                            Detail</button></a>

                                    <a href="{{ route('roles.edit', $role->id) }}"><button type="button"
                                            class="btn btn-sm btn-warning py-2"><i class="fas fa-edit"></i>
                                            Edit</button></a>

                                    {{-- <button type="button" class="btn btn-sm btn-danger py-2 delete" id="{{ $role->id }}"><i
                                        class="fas fa-trash"></i>Delete</button> --}}

                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="fas fa-trash-alt"></i>
                                            Delete</button>
                                    </form>
                                </div>
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
                        url: '/roles/' + id,
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
