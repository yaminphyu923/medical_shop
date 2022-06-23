@extends('backend.main')

@section('orderlist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Order List</b></h5>

                        <div class="d-flex justify-content-end">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-3">
                <div class="table-responsive">
                    <table class="datatable table table-strip table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_lists as $order_list)
                                @foreach (unserialize($order_list->order) as $order)
                                    <tr>
                                        <td>{{ $order['name'] }}</td>
                                        <td>{{$order['price']}}<td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
