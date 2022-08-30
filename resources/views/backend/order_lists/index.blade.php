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
                <form action="{{ route('search-date') }}" method="get">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="" class="col-sm-1">Start Date : &nbsp; </label>
                        <div class="col-sm-2">
                            <input type="date" name="startDate" class="form-control ml-1" style="margin-right: 5px;"
                                value="{{ request()->startDate }}">
                        </div>

                        <label for="" class="col-sm-1 ml-2">End Date : &nbsp; </label>
                        <div class="col-sm-2">
                            <input type="date" name="endDate" class="form-control ml-1" style="margin-right:5px;"
                                value="{{ request()->endDate }}">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" name="search" class="btn btn-primary btn-sm">🔍
                                Search</button>

                            <a href="{{ route('order-lists') }}">
                                <button type="button" class="btn btn-sm btn-primary"><i class="fas fa-undo"></i><b>
                                        All</b></button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-sm-12 mt-3">
                <div class="table-responsive">
                    <table class="datatable table table-strip table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Voucher</th>
                                <th>Name</th>
                                <th>Expired Date</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_details as $order_detail)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $order_detail->created_at->format('d-M-Y') }}</td>
                                    <td>{{ $order_detail->order != null ? $order_detail->order->voucher : '' }}</td>
                                    <td>{{ $order_detail->medicalList != null ? $order_detail->medicalList->name : '' }}
                                    </td>
                                    <td>{{ $order_detail->medicalList != null ? Date('d-M-Y', strtotime($order_detail->medicalList->expired_date)) : '' }}
                                    </td>
                                    <td>{{ $order_detail->price }}
                                    </td>
                                    <td>{{ $order_detail->qty }}</td>
                                    <td>{{ number_format((int) $order_detail->qty * (int) $order_detail->price) }}
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
    <script></script>
@endsection
