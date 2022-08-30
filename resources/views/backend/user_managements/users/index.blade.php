@extends('backend.main')

@section('usermanagement-active', 'active')

@section('user-active', 'active')

@section('list-title', 'User List')

@section('content')
    @include('backend.user_managements.head')

    <div class="col-sm-12">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('users.create') }}">
                <button type="button" class="btn btn-md btn-primary"><i class="fas fa-plus-circle"></i>
                    <b>Create User</b></button>
            </a>
        </div>

        <div class="table-responsive">
            <table class="datatable table table-stripped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge bg-success">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('users.show', $user->id) }}"><button type="button"
                                            class="btn btn-sm btn-primary py-2"><i class="fas fa-eye"></i>
                                            Detail</button></a>

                                    <a href="{{ route('users.edit', $user->id) }}"><button type="button"
                                            class="btn btn-sm btn-warning py-2"><i class="fas fa-edit"></i>
                                            Edit</button></a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" type="submit"><i
                                                class="fas fa-trash-alt"></i>
                                            Delete</button>
                                    </form>
                                </div>

                                {{-- <button type="button" class="btn btn-sm btn-danger py-2 delete" id="{{ $user->id }}"><i
                                        class="fas fa-trash"></i>Delete</button> --}}
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
                        url: '/users/' + id,
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
