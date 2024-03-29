@extends('backend.main')

@section('medicallist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Category</b></h5>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('medical-lists.index') }}">
                                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i><b>
                                        Back</b></button>&nbsp;
                            </a>

                            <a href="{{ route('categories.create') }}">
                                <button type="button" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i><b>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="d-flex justify-content-start">
                                        <a href="{{ route('categories.edit', $category->id) }}">
                                            <button type="button" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i>
                                                Edit</button>
                                        </a>

                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger btn-sm" type="submit"><i
                                                    class="fas fa-trash-alt"></i> Delete</button>
                                        </form>

                                        {{-- <button type="button" class="btn btn-sm btn-danger delete"
                                            id="{{ $category->id }}"><i class="fas fa-trash"></i>
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
                        url: '/categories/' + id,
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
