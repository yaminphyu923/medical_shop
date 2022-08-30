<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('icons/medicine.png') }}">
    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
    <link href="{{ asset('assets/fontawesome/all.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/datatable/jquery.dataTables.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style type="text/css" media="print">
        /* @font-face {
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

        @page {
            size: A4;
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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-title">
                    <div class="card-header d-flex justify-content-between">
                        {{-- <div style="margin: 0px auto;">
                            <img src="{{ asset('icons/neo.jpg') }}" alt="" style="widht:200px;height:150px;">

                        </div> --}}
                        <h3><b>NEO(E-188, တတိယထပ်, ရွှေပြည့်စုံဈေး, ☎ 095059490)({{ $order->voucher }})</b></h3>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('order.index') }}"><button type="button"
                                    class="btn btn-sm btn-info btn-con" id="btn-con">Back</button></a>
                            <a href="{{ route('print-page') }}">
                                <button type="button" class="btn btn-sm btn-primary btn-back" id="btn-back">
                                    Small Size Print
                                </button>
                            </a>


                            <a href="#"><button type="button" class="btn btn-sm btn-success btn-print"
                                    onclick="printing()" id="btn-print">Print</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_details as $od)
                                <tr>
                                    <td style="padding: 0px;">{{ $od->medicalList->name }}</td>
                                    <td style="padding: 0px;">{{ number_format($od->price) }}</td>
                                    <td style="padding: 0px;">{{ $od->qty }}</td>
                                    <td style="padding: 0px;">{{ number_format((int) $od->price * (int) $od->qty) }}
                                    </td>
                                </tr>
                            @endforeach

                            {{-- <tr>
                                <td colspan="3" class="text-end">Voucher :</td>
                                <td>{{ $order->voucher }}</td>
                            </tr> --}}

                            <tr>
                                @if ($order->customer_id != 'Select Customer...' || !$order->customer_id)
                                    <td style="text-align: left;padding:0px;"><small>Customer :</small></td>
                                    <td style="padding: 0px;">
                                        <i><small>{{ $order->customer != null ? $order->customer->name : '' }}</small></i>
                                    </td>
                                @endif
                                <td style="padding: 0px;">Grand Total :</td>
                                <td style="padding: 0px;">{{ number_format($grand_total) }}</td>
                            </tr>

                            @if ($order->pay_money)
                                <tr>
                                    <td style="text-align: left;padding:0px;"><small>Pay money :</small></td>
                                    <td colspan="3" style="text-align: left;padding:0px;">
                                        <i><small>{{ number_format($order->pay_money) }}</small></i>
                                    </td>
                                </tr>
                            @endif

                            @if ($order->debt_money)
                                <tr>
                                    <td style="text-align: left;padding:0px;"><small>Debt money :</small></td>
                                    <td colspan="3" style="text-align: left;padding:0px;">
                                        <i><small>{{ number_format($order->debt_money) }}</small></i>
                                    </td>
                                </tr>
                            @endif

                            {{-- @if ($order->debt)
                                <tr>
                                    <td style="text-align: left;padding:0px;"><small>Debt :</small></td>
                                    <td colspan="3" style="text-align: left;padding:0px;">
                                        <i><small>{{ $order->debt }}</small></i>
                                    </td>
                                </tr>
                            @endif --}}

                            {{-- <tr>
                                <td colspan="4" style="text-align: center;"><small>Open Daily</small></td>
                            </tr>

                            <tr>
                                <td colspan="4" style="text-align: center;"><small>ဝယ်ပြီးပစ္စည်း ပြန်မလဲပါ။</small>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="4" style="text-align: center;"><small>ဝယ်ယူအားပေးမှုအတွက်
                                        ကျေးဇူးတင်ပါသည်။</small></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
