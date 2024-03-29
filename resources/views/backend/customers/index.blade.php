@extends('backend.main')

@section('customer-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Cutomers</b></h5>

                        <a href="{{ route('customers.create') }}">
                            <button type="button" class="btn btn-sm btn-success"><i class="fas fa-plus-circle"></i><b>
                                    Create</b></button>
                        </a>
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
                                <th>Phone</th>
                                <th>NRC</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->nrc }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->age }}</td>
                                    <td>{{ $customer->sex }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('customers.edit', $customer->id) }}">
                                                <button type="button" class="btn btn-sm btn-warning"><i
                                                        class="fas fa-edit"></i>
                                                    Edit</button>
                                            </a>

                                            {{-- <button type="button" class="btn btn-sm btn-danger delete"
                                            id="{{ $customer->id }}"><i class="fas fa-trash"></i>
                                            Delete</button> --}}

                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
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

            // url: '/neo/public/customers/delete/' + id,

            Swal.fire({
                title: 'Are you sure, you want to delete?',
                showCancelButton: true,
                confirmButtonText: `Confirm`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: '/customers/' + id,
                        success: function(result) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted Successfully!',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            //console.log(result.customer);
                            location.reload();
                        }
                    });
                }
            })
        })
    </script>
@endsection
