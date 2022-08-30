@extends('backend.main')

@section('voucherlist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Debt Money List</b></h5>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('voucher-list') }}">
                                <button type="button" class="btn btn-sm btn-danger"><i class="fas fa-chevron-left"></i><b>
                                        Back</b></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-12 mt-3">
            <div class="table-responsive">
                <table class="datatable table table-strip table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Voucher</th>
                            <th>Customer</th>
                            <th>Debt Money</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                <td>{{ $order->voucher }}</td>
                                <td>{{ $order->customer != null ? $order->customer->name : '' }}
                                </td>

                                <td>{{ $order->debt_money }}
                                </td>
                                <td class="d-flex justify-content-start">
                                    @if ($order->status != 1)
                                        <form action="{{ route('orders.update', $order->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                            <input type="hidden" name="status" value="1">
                                            <button class="btn btn-success btn-sm" type="submit">Save Permanently</button>
                                        </form>
                                    @endif

                                    <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
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
