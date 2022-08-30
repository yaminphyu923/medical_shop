@extends('backend.main')

@section('voucherlist-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="text-light"><b>Voucher List</b></h5>

                        <div class="d-flex justify-content-end">
                            <form action="{{ route('orders.delete') }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-danger btn-sm" type="submit" data-toggle="tooltip"
                                        data-placement="top"
                                        title="နောက်ဆုံးသွင်းထားသော (၁)လ အထိ data များနဲ့ save permanently
                                        မဖြစ်သော data များမှလွဲ၍ အကုန်ပျက်ပါသည်။">
                                        Delete All</button>
                                </div>

                                <span class="text-danger"><b>နောက်ဆုံးသွင်းထားသော (၁)လ အထိ data များနဲ့ save permanently
                                        မဖြစ်သော data များမှလွဲ၍ အကုန်ပျက်ပါသည်။</b></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('note-list') }}"><button type="button" class="btn btn-md btn-info"><b>Debt Money
                                List</b></button></a>
                    <a href="{{ route('debt-list') }}"><button type="button" class="btn btn-md btn-info"><b>Pay Money
                                List</b></button></a>
                </div>
            </div>

        </div>

        <div class="col-sm-12 mt-3">
            <form action="{{ route('checked-delete') }}" method="GET" id="checkDel">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger" form="checkDel">Delete Select</button>
            </form>
            <div class="table-responsive mt-2">
                <table class="datatable table table-strip table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll" form="checkDel">All</th>
                            <th>Date</th>
                            <th>Voucher</th>
                            <th>Customer</th>
                            <th>Pay Money</th>
                            <th>Debt Money</th>
                            <th>Debt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td><input type="checkbox" name="id[]" id="checkItem" value="{{ $order->id }}"
                                        form="checkDel">
                                </td>
                                <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                <td>{{ $order->voucher }}</td>
                                <td>{{ $order->customer != null ? $order->customer->name : '' }}
                                </td>
                                <td>{{ $order->pay_money }}
                                </td>
                                <td>{{ $order->debt_money }}
                                </td>
                                <td>{{ $order->debt }}</td>
                                <td class="d-flex justify-content-start">

                                    @if ($order->status != 1)
                                        <form action="{{ route('orders.update', $order->id) }}" method="POST"
                                            id="sp">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}

                                            {{-- <input type="text" name="order_id" value="{{ $order->id }}"
                                                form="sp"> --}}
                                            <button class="btn btn-success btn-sm" type="submit" form="sp">Save
                                                Permanently</button>
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
@endsection

@section('script')
    <script>
        $('#checkAll').click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endsection
