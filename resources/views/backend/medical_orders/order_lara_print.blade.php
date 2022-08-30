<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
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

        /*

        @font-face {
            font-family: 'Myanmar3';
            src: local('Myanmar3'), url('https://www.mmwebfonts.com/fonts/myanmar3.ttf')
        }

        html,
        body,
        a,
        p,
        span,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        h1#page-title.title {
            font-family: 'Myanmar3' !important;
            letter-spacing: 0px
        } */
    </style>

    <style type="text/css" media="print">
        @page {
            /* size: auto; */
            /* auto is the initial value */
            margin: 0;
            /* this affects the margin in the printer settings */
        }

        @media print {

            #btn-print,
            #btn-back,
            #btn-con {
                display: none;
            }
        }
    </style>
</head>
{{-- onmousemove="printBtnShow()" --}}

<body>
    <button type="button" class="btn btn-sm btn-primary btn-print" id="btn-print" onclick="printing()">Small Size
        Print</button>
    <a href="{{ route('a4print-page') }}">
        <button type="button" class="btn btn-sm btn-primary btn-back" id="btn-back">
            A4 Size Print
        </button>
    </a>
    <a href="{{ route('order.index') }}"><button type="button" class="btn btn-sm btn-primary btn-con"
            id="btn-con">Back</button></a>

    <h5 style="padding-left:10px;margin:5px 0px;">{{ $order->created_at->format('d-M-Y h:i:s A') }}</h5>
    {{-- ရန်ကင်းအောင်({{ $order->voucher }}) --}}

    <h4 style="margin:0px;padding-bottom:0px;padding-left:10px;">

        NEO (☎ 095059490)({{ $order->voucher }})
    </h4>
    <span style="padding-left:10px;margin:0px;font-size:13px;"><small>E-188, တတိယထပ်, ရွှေပြည့်စုံဈေး</small>
    </span>

    {{-- <span style="padding-bottom:30px;padding-left:10px"><small>အထူးကုဆေးခန်းနှင့်အဆင့်မြင့်ရောဂါရှာဖွေရေးစင်တာ</small>
    </span> --}}

    <table style="margin-top:0px;font-size:12px;">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
        @foreach ($order_details as $od)
            <tr>
                <td>{{ $od->medicalList->name }}</td>
                <td>{{ number_format($od->price) }}</td>
                <td>{{ $od->qty }}</td>
                <td>{{ number_format((int) $od->price * (int) $od->qty) }}</td>
            </tr>
        @endforeach

        <tr style="padding: 30px;">

            <td colspan="3">Grand Total :</td>
            <td>{{ number_format($grand_total) }}</td>
        </tr>

        <tr>
            @if ($order->customer_id != 'Select Customer...' || !$order->customer_id)
                <td style="text-align: left;padding:0px;"><small>Customer</small></td>
                <td colspan="3" style="text-align: left;padding:0px;">
                    <i><small>{{ $order->customer != null ? $order->customer->name : '' }}</small></i>
                </td>
            @endif
        </tr>

        @if ($order->pay_money)
            <tr>
                <td style="text-align: left;padding:0px;"><small>Pay Money</small></td>
                <td colspan="3" style="text-align: left;padding:0px;">
                    <i><small>{{ number_format($order->pay_money) }}</small></i>
                </td>

            </tr>
        @endif

        @if ($order->debt_money)
            <tr>
                <td style="text-align: left;padding:0px;"><small>Debt Money</small></td>
                <td colspan="3" style="text-align: left;padding:0px;">
                    <i><small>{{ number_format($order->debt_money) }}</small></i>
                </td>

            </tr>
        @endif

        {{-- @if ($order->debt)
            <tr style="margin-bottom: 20px;">
                <td style="text-align: left;"><small>Debt</small></td>
                <td colspan="3" style="text-align: left;"><i><small>{{ $order->debt }}</small></i></td>

            </tr>
        @endif --}}

        {{-- <tr>
            <td colspan="4" style="text-align: center;"><small>Open Daily</small></td>
        </tr>

        <tr>
            <td colspan="4" style="text-align: center;"><small>ဝယ်ပြီးပစ္စည်း ပြန်မလဲပါ။</small></td>
        </tr>

        <tr>
            <td colspan="4" style="text-align: center;"><small>ဝယ်ယူအားပေးမှုအတွက် ကျေးဇူးတင်ပါသည်။</small></td>
        </tr> --}}


    </table>

    {{-- <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script> --}}
    <script>
        function printing() {
            // var btnPrint = document.querySelector(".btn-print");
            // var btnBack = document.querySelector(".btn-back");
            // var btnCon = document.querySelector(".btn-con");

            // btnPrint.style.display = "none";
            // btnBack.style.display = "none";
            // btnCon.style.display = "none";
            window.print();
        }

        // function printBtnShow() {
        //     var btnPrint = document.querySelector(".btn-print");
        //     var btnBack = document.querySelector(".btn-back");
        //     var btnCon = document.querySelector(".btn-con");

        //     btnPrint.style.display = "inline";
        //     btnBack.style.display = "inline";
        //     btnCon.style.display = "inline";
        // }
    </script>

</body>

</html>
