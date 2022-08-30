<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEO</title>
    <link rel="icon" type="image/png" href="{{ asset('icons/medicine.png') }}">
    <link href="{{ asset('css/print.css') }}" rel="stylesheet">

    <style>
        th,
        td {
            width: 100px;
        }

        td {
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        /* @page {
            size: auto;
            margin: 0;
        } */
    </style>
</head>

<body style="height:100vh;" onmousemove="printBtnShow()">
    <button type="button" class="btn btn-sm btn-primary btn-print" onclick="printing()">Print</button>
    <a href="{{ route('order.index') }}"><button type="button"
            class="btn btn-sm btn-primary btn-back">Continue</button></a>

    <h3 style="margin-bottom:30px;">NEO Pharmacy(☎ 095059490)</h3>
    <div class="flex-container">

    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
        @foreach ($order_details as $od)
            <tr>
                <td>{{ $od->medicalList->name }}</td>
                <td>{{ number_format($od->medicalList->price) }}</td>
                <td>{{ $od->qty }}</td>
                <td>{{ number_format((int) $od->medicalList->price * (int) $od->qty) }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="3">Voucher :</td>
            <td>{{ $order->voucher }}</td>
        </tr>

        <tr>
            <td colspan="3">Grand Total :</td>
            <td>{{ number_format($order->total_amount) }}</td>
        </tr>
    </table>

    {{-- <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script> --}}
    <script>
        function printing() {
            var btnPrint = document.querySelector(".btn-print");
            var btnBack = document.querySelector(".btn-back");

            btnPrint.style.display = "none";
            btnBack.style.display = "none";
            window.print();
        }

        function printBtnShow() {
            var btnPrint = document.querySelector(".btn-print");
            var btnBack = document.querySelector(".btn-back");

            btnPrint.style.display = "inline";
            btnBack.style.display = "inline";
        }
    </script>

</body>

</html>
