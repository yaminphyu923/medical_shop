{{-- @extends('backend.main')

@section('medicalorder-active', 'active')

@section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('icons/medicine.png') }}">
    <title>
        {{-- {{ config('app.name', 'Laravel') }} --}}
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
</head>

<body class="g-sidenav-show  bg-gray-200">
    {{-- @include('backend.sidebar') --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        @include('sweetalert::alert')
        {{-- onmousemove="printShow()" --}}

        <div class="container-fluid" onmousemove="printShow()">

            <div class="row search-card my-1">

                <div class="col-sm-6">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Enter Name..." autocomplete="off"
                                        value="{{ request()->search }}">
                                    <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-search"></i>
                                        Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-6 text-end">
                    <a href="{{ route('dashboard') }}">
                        <button type="button" class="btn btn-sm btn-info"><i class="fas fa-chevron-left"></i><b>
                                Menu</b></button>
                    </a>
                </div>

                <div class="col-sm-12 mt-1">
                    <a href="{{ route('orders.index') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">All</button></a>
                    <a href="{{ route('alpha-search', 'A') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">A</button></a>
                    <a href="{{ route('alpha-search', 'B') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">B</button></a>
                    <a href="{{ route('alpha-search', 'C') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">C</button></a>
                    <a href="{{ route('alpha-search', 'D') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">D</button></a>
                    <a href="{{ route('alpha-search', 'E') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">E</button></a>
                    <a href="{{ route('alpha-search', 'F') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">F</button></a>
                    <a href="{{ route('alpha-search', 'G') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">G</button></a>
                    <a href="{{ route('alpha-search', 'H') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">H</button></a>
                    <a href="{{ route('alpha-search', 'I') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">I</button></a>
                    <a href="{{ route('alpha-search', 'J') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">J</button></a>
                    <a href="{{ route('alpha-search', 'K') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">K</button></a>
                    <a href="{{ route('alpha-search', 'L') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">L</button></a>
                    <a href="{{ route('alpha-search', 'M') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">M</button></a>
                    <a href="{{ route('alpha-search', 'N') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">N</button></a>
                    <a href="{{ route('alpha-search', 'O') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">O</button></a>
                    <a href="{{ route('alpha-search', 'P') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">P</button></a>
                    <a href="{{ route('alpha-search', 'Q') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">Q</button></a>
                    <a href="{{ route('alpha-search', 'R') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">R</button></a>
                    <a href="{{ route('alpha-search', 'S') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">S</button></a>
                    <a href="{{ route('alpha-search', 'T') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">T</button></a>
                    <a href="{{ route('alpha-search', 'U') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">U</button></a>
                    <a href="{{ route('alpha-search', 'V') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">V</button></a>
                    <a href="{{ route('alpha-search', 'W') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">W</button></a>
                    <a href="{{ route('alpha-search', 'X') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">X</button></a>
                    <a href="{{ route('alpha-search', 'Y') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">Y</button></a>
                    <a href="{{ route('alpha-search', 'Z') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">Z</button></a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-7 auto-height medical-card">
                    <div class="row">
                        @foreach ($medical_lists as $medical_list)
                            @if ($medical_list->total_qty > 0)
                                <div class="col-sm-4 mb-5">
                                    <div class="card order-hover">
                                        <div class="card-body order-card">
                                            @if ($medical_list->total_qty <= $medical_list->last_remaining_qty)
                                                <span class="text-danger"><b><i
                                                            class="fas fa-exclamation-triangle"></i> Unavailability due
                                                        to less than
                                                        {{ $medical_list->last_remaining_qty }} qtys.</b> </span>
                                            @endif
                                            @if ($medical_list->photo)
                                                <img src="{{ asset('icons/stock_photos/' . $medical_list->photo) }}"
                                                    class="order-photo" alt="">
                                            @else
                                                <p class="text-danger text-center"><b>No Photo</b></p>
                                            @endif
                                            <div class="d-flex justify-content-end">
                                                <button type="button" class="btn btn-order btn-info"
                                                    onclick="addToOrder({{ $medical_list->id }})"
                                                    @if ($medical_list->total_qty <= $medical_list->last_remaining_qty) disabled @endif>Order</button>
                                            </div>

                                        </div>
                                        <div class="card-footer p-1">

                                            <div class="d-flex justify-content-between">
                                                <p class="m-0 pl-3"><b>{{ $medical_list->name }}</b></p>
                                                <p class="badge bg-info mt-1"><b>Qty -
                                                        {{ number_format($medical_list->total_qty) }}</b>
                                                </p>
                                            </div>


                                            {{-- {{ number_format($medical_list->price) }} --}}

                                            {{-- @foreach (explode(',', $medical_list->price) as $price)
                                                <span class="badge bg-success m-0"><b>🎀
                                                        <?php $priceInt = (int) $price; ?>
                                                        {{ number_format($priceInt) }}
                                                        MMK</b></span>
                                            @endforeach
                                            @foreach (explode(',', $medical_list->unit_id) as $unit)
                                                <span class="badge bg-success m-0"><b>Unit
                                                        ({{ $unit }})
                                                    </b></span>
                                            @endforeach --}}

                                            <div class="d-flex justify-content-between">
                                                @if ($medical_list->total_qty > 0)
                                                    <p class="badge bg-danger mt-0">
                                                        Exp-{{ date('M-d-Y', strtotime($medical_list->expired_date)) }}
                                                        Qty-{{ $medical_list->total_qty }}</p>
                                                @endif

                                            </div>


                                            {{-- @foreach ($medical_list->refills as $refill)
                                                <p class="m-0 badge bg-danger">
                                                    Exp-{{ date('M-d-Y', strtotime($refill->refill_exp)) }}
                                                    Qty -
                                                    {{ $refill->refill_qty }}</p>
                                            @endforeach --}}

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{ $medical_lists->links('pagination::bootstrap-4') }}
                </div>


                <div class="col-sm-5 order-list">
                    <h4 class="my-4"><b><span style="font-size:42px;">NEO</span> Order List</b></h4>
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th class="select-exp">Select Exp</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    {{-- <th class="total-qty">Total Qty</th> --}}
                                </tr>
                            </thead>

                            <tbody id="tablebody">
                                {{-- <tr class="btn-card">
                                        <td colspan="3">

                                        </td>
                                        <td>

                                        </td>

                                    </tr> --}}
                            </tbody>

                            {{-- <button id="submitBtn" class="btn btn-sm btn-success">Check Out</button>
                                <button class="btn btn-sm btn-success" onclick="printBtn()">
                                    Print
                                </button> --}}

                        </table>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-sm-11 auto-height medical-card">
                    <div class="row">
                        @foreach ($medical_lists as $medical_list)
                            <div class="col-sm-3 mb-5">
                                <div class="card order-hover">
                                    <div class="card-body order-card">
                                        @if ($medical_list->photo)
                                            <img src="{{ asset('icons/stock_photos/' . $medical_list->photo) }}"
                                                class="order-photo" alt="">
                                        @else
                                            <p class="text-danger order-photo"><b>No Photo</b></p>
                                        @endif
                                        <p class="text-end my-2"><b>🎀 {{ number_format($medical_list->price) }}
                                                MMK</b></p>
                                    </div>
                                    <div class="card-footer p-1">

                                        <div class="d-flex justify-content-between">
                                            <p class="m-0 pl-3"><b>{{ $medical_list->name }}</b></p>
                                            <p class="badge bg-info mt-1"><b>Qty -
                                                    {{ number_format($medical_list->total_qty) }}</b>
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            @if ($medical_list->qty > 0)
                                                <p class="badge bg-danger mt-0">
                                                    Exp-{{ date('M-d-Y', strtotime($medical_list->expired_date)) }}
                                                    Qty-{{ $medical_list->qty }}</p>
                                            @endif

                                            <button type="button" class="btn btn-order btn-info"
                                                onclick="addToOrder({{ $medical_list->id }})">Order</button>
                                        </div>


                                        @foreach ($medical_list->refills as $refill)
                                            <p class="m-0 badge bg-danger">
                                                Exp-{{ date('M-d-Y', strtotime($refill->refill_exp)) }}
                                                Qty -
                                                {{ $refill->refill_qty }}</p>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}



        </div>
        <footer class="footer">

            <div class="d-flex align-items-center justify-content-end">
                <div>Software by MMCities</div>
            </div>

        </footer>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn btn-outline-dark w-100" href="">View documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
    <script src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            let token = document.head.querySelector('meta[name="csrf-token"]');

            if (token) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token.content
                    }
                });
            }
        });


        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        // Datatable

        $('.datatable').DataTable({
            "order": [
                [0, "desc"]
            ],
            "pageLength": 10,
        });

        $('.myselect').select2({
            width: '100%',
            placeholder: "Select an Option",
            allowClear: true
        });

        // $('.print').on('click', function() {
        //     $('.print-btn').hide();
        //     window.print();
        // });

        // $('#page-top').on('mouseover', function() {
        //     $('.print-btn').show();
        // })
    </script>

    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.2') }}"></script>
    {{-- @section('script') --}}
    <script>
        function gotoTable() {
            $.ajax({
                type: 'POST',
                url: '/orders-table',
                data: {
                    'orders': getOrderItems(),
                },
                success: function(result) {
                    //clearOrder();
                    //console.log(result);
                    // result.order_list.forEach((order) => {
                    //     console.log(order);
                    // })
                    saveOrder(JSON.stringify(result.order_list), JSON.stringify(result.refills), JSON.stringify(
                        result.order_list_prices));
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            })
        }

        function saveOrder(result, refills, order_prices) {
            localStorage.setItem("orders", result);
            localStorage.setItem("refills", refills);
            localStorage.setItem("orders_prices", order_prices);
            let results = localStorage.getItem("orders");
            let refill_orders = localStorage.getItem("refills");
            let orders_prices = localStorage.getItem("orders_prices");
            showOrder(results, refill_orders, orders_prices);
        }

        function updateOrder() {

        }

        function addOrderQty(id) {

            var results = JSON.parse(localStorage.getItem("orders"));
            var refill_orders = localStorage.getItem("refills");
            var orders_prices = localStorage.getItem("orders_prices");
            results.forEach((result) => {
                // console.log(result.id);
                if (result.id === id) {
                    result.showqty = parseInt(result.showqty) + 1;
                }
            });

            saveOrder(JSON.stringify(results), refill_orders, orders_prices);
        }

        function calOrderQty(id) {
            //console.log(document.querySelector('.showQty').value);

            var results = JSON.parse(localStorage.getItem("orders"));
            var refill_orders = localStorage.getItem("refills");
            var orders_prices = localStorage.getItem("orders_prices");

            results.forEach((result) => {
                // var qty = JSON.parse(localStorage.getItem("qtys"));
                if (result.id === id) {
                    result.showqty = document.querySelector(".showQty_" + id).value;
                    // qty.push(result.showqty);
                    // localStorage.setItem("qtys", JSON.stringify(qty));
                    // console.log(localStorage.getItem("qtys"));
                }

            });
            saveOrder(JSON.stringify(results), refill_orders, orders_prices);
        }

        function removeOrderQty(id) {
            var results = JSON.parse(localStorage.getItem("orders"));
            var refill_orders = localStorage.getItem("refills");
            var orders_prices = localStorage.getItem("orders_prices");
            results.forEach((result) => {
                // console.log(result.id);
                if (result.id === id) {
                    result.showqty = parseInt(result.showqty) > 1 ? parseInt(result.showqty) - 1 : 1;
                }
            });

            saveOrder(JSON.stringify(results), refill_orders, orders_prices);
        }

        function deleteOrder(id) {
            var results = JSON.parse(localStorage.getItem("orders"));
            var refill_orders = localStorage.getItem("refills");
            var orders_prices = localStorage.getItem("orders_prices");
            // var new_results;

            results.forEach((result) => {

                if (result.id == id) {
                    var ind = results.indexOf(result);
                    //console.log(ind);
                    results.splice(ind, 1);
                }
            })

            deleteItem(id);

            saveOrder(JSON.stringify(results), refill_orders, orders_prices);
        }

        function deleteItem(id) {
            var ary = JSON.parse(localStorage.getItem("items"));

            if (ary != null) {
                ary.forEach((item) => {
                    if (item == id) {
                        var ind = ary.indexOf(item);
                        ary.splice(ind, 1);
                    }
                });
            }

            localStorage.setItem("items", JSON.stringify(ary));
        }

        var count = 0;

        function showOrder(results, refill_orders, orders_prices) {
            //console.log(JSON.parse(refill_orders));
            //clearOrder();
            //console.log(JSON.parse(results));
            var str = "";
            var total = 0;
            var row = count + 1;
            count++;
            var d;
            //console.log(results);
            JSON.parse(results).forEach((result) => {

                //console.log(result.showqty);
                var refill = "";
                total += result.showqty * result.price;
                sum = parseInt(result.showqty) * parseInt(result.price);



                //console.log(refill_orders[index]);

                JSON.parse(refill_orders).forEach((refill_order_wrapper) => {

                    refill_order_wrapper.forEach((refill_order) => {
                        if (refill_order.medical_list_id == result.id) {
                            //console.log(refill_order);
                            refill += '<option value="r_' + refill_order.id + '">' + refill_order
                                .refill_exp +
                                '</option>'
                            //refill = '<option value="hi">Hi</option>';
                        }
                    });

                });

                // JSON.parse(orders_prices).forEach((orders_price_wrapper) => {

                //     orders_price_wrapper.forEach((orders_price) => {
                //         if (orders_price.medical_list_id == result.id && orders_price.unit == result
                //             .showqty) {
                //             total = orders_price.price;
                //         }

                //     });
                //     // console.log(orders_price);
                // });

                //console.log(refill);

                str += '<tr>' +
                    '<td>' + result.name + '</td>' +
                    '<td class="showPrice_' + result.id + '">' + result.price + '</td>' +
                    '<td>' + result.expired_date + '</td>' +
                    // '<td class="opt-exp' + row + '">' +
                    // '<select class="form-control exp">' +
                    // '<option>Select option....</option>' +
                    // '<option value="m_' + result.id + '_' + row + '">' + result.expired_date + '</option>' +
                    // refill +
                    // '</select>' +
                    // '</td>' +
                    '<td>' +
                    '<span class="badge bg-success"><i class="fas fa-plus" style="cursor:pointer;" onclick="addOrderQty(' +
                    result.id + ')"></i></span>' +
                    // '<span id="showQty">' + result.showqty + '</span>' +

                    '<span style="display:inline-block;">' +
                    '<input type="text" class="form-control showQty_' + result.id +
                    '" id="showQty" style="width:50px;padding:0px;" name="quantity[]" value="' +
                    result.showqty + '">' +
                    '</span>' +

                    '<span style="display:inline-block;">' +
                    '<input type="hidden" class="form-control showQty_' + result.id +
                    '" id="showQty" style="width:50px;padding:0px;" name="medical_list_id[]" value="' +
                    result.id + '">' +
                    '</span>' +


                    '<span class="badge bg-success"><i class="fas fa-calculator" style="cursor:pointer;" onclick="calOrderQty(' +
                    result.id + ')"></i></span>' +
                    '<span class="badge bg-success"><i class="fas fa-minus" style="cursor:pointer;" onclick="removeOrderQty(' +
                    result.id + ')"></i></span>' +
                    '<span class="badge bg-danger"><i class="fas fa-trash" style="cursor:pointer;" onclick="deleteOrder(' +
                    result.id + ')"></i></span>' +
                    '</td>' +
                    '<td id="show_Total' + result.id + '">' + sum.toLocaleString() + '</td>' +
                    '</tr>'



                //     str += `
            //     <td>${result.name}</td>
            //     <td>${parseInt(result.price).toLocaleString()}</td>
            //     <td class="opt-exp${row}">
            //         <select class="form-control exp">
            //             <option>Select option....</option>
            //             <option value="${'m_'+result.id}">${result . expired_date}</option>

            //         </select>
            //     </td>
            //     <td>
            //         <span class="badge bg-success"><i class="fas fa-plus" style="cursor:pointer;" onclick="addOrderQty(${result.id})"></i></span>
            //         <span id="showQty">${result.showqty}</span>
            //         <span class="badge bg-success"><i class="fas fa-minus" style="cursor:pointer;" onclick="removeOrderQty(${result.id})"></i></span>
            //         <span class="badge bg-danger"><i class="fas fa-trash" style="cursor:pointer;" onclick="deleteOrder(${result.id})"></i></span>
            //     </td>
            //     <td>${parseInt(result.showqty * result.price/12).toLocaleString()}</td>

            // `;
                //         str += `
            //     <td>${result.name}</td>
            //     <td>${parseInt(result.price).toLocaleString()}</td>
            //     <td class="opt-exp${row}">
            //         <select class="form-control exp">
            //             <option>Select option....</option>
            //             <option value="${'m_'+result.id}">${result . expired_date}</option>

            //         </select>
            //     </td>
            //     <td>
            //         <span class="badge bg-success"><i class="fas fa-plus" style="cursor:pointer;" onclick="addOrderQty(${result.id})"></i></span>
            //         <span id="showQty">${result.showqty}</span>
            //         <span class="badge bg-success"><i class="fas fa-minus" style="cursor:pointer;" onclick="removeOrderQty(${result.id})"></i></span>
            //         <span class="badge bg-danger"><i class="fas fa-trash" style="cursor:pointer;" onclick="deleteOrder(${result.id})"></i></span>
            //     </td>
            //     <td>${parseInt(result.showqty * result.price/12).toLocaleString()}</td>

            // `;
                // str += "</tr>";

            });

            str += `
            <tr>
                <td colspan="3" class="text-end"><b>Grand Total : </b></td>
                <td id="total_amount">${total.toLocaleString()}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" class="text-end"><b>Voucher Id : </b></td>
                <td id="voucher">${new Date().getTime()}</td>
                <td></td>
            </tr>
            `;

            str += '<tr class="btn-card">' +
                '<td colspan="3" class="text-end">' +
                '<button class="btn btn-sm btn-success" onclick="payOut()">Check Out</button>' +
                // '<button id="submitBtn" class="btn btn-sm btn-success">Check Out</button>' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-sm btn-success" onclick="printBtn(' + row + ')">Print</button>' +
                '</td>' +
                '</tr>'


            $('#tablebody').html(str);


        }
        $("#submitBtn").click(function() {
            $(".myForm").submit(); // Submit the form

        });


        //send to server
        function payOut() {

            var quantities = document.getElementsByName('quantity[]');
            var medical_lists = document.getElementsByName('medical_list_id[]');
            var qtys = [];
            var medical_list_id = [];

            for (var i = 0; i < quantities.length; i++) {
                let qty = quantities[i];
                let medical_list = medical_lists[i];
                qtys.push(qty.value);

                medical_list_id.push(medical_list.value);
            }

            let medical_id = Array(medical_list_id);

            //console.log(k);

            var results = JSON.parse(localStorage.getItem("orders"));
            // console.log(results);
            let voucher = $('#voucher').text();

            let total_amount = $('#total_amount').text();


            // var qtys = [];

            // results.forEach((result) => {
            //     //console.log(result);

            //     // localStorage.setItem("qtys", JSON.stringify(document.querySelector(".showQty_" + result.id)
            //     //     .value))
            //     results.push(document.querySelector(".showQty_" + result.id).value);
            //     results.push(document.querySelector(".showPrice_" + result.id).text);
            //     results.push(document.querySelector(".showTotal_" + result.id).text);

            //     // showTotal = $(".showPrice_" + result.id).text();

            //     // results.push("qtys");

            // });
            // results.push(qtys);
            //console.log(qtys);
            // let showQty = $('#showQty').text();
            //alert(showQty);
            // var selected = [];
            // for (var option of document.querySelector('.exp').options) {
            //     if (option.selected) {
            //         selected.push(option.value);
            //     }
            // }
            $.ajax({
                type: 'POST',
                url: '/payout',
                data: {
                    'items': results,
                    'voucher': voucher,
                    'total_amount': total_amount,
                    'qtys': qtys,
                    'medical_list_id': medical_list_id,
                },
                success: function(result) {
                    clearOrder();
                    window.location.reload();
                    //console.log(result);
                    //saveOrder(result);
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            })
        }

        function printBtn(row) {
            // console.log(row);
            var medicalCard = document.querySelector(".medical-card");
            var searchCard = document.querySelector(".search-card");

            medicalCard.style.display = 'none';
            searchCard.style.display = 'none';
            if ($('.btn-card').length > 0) {
                var btnCard = document.querySelector(".btn-card");
                btnCard.style.display = 'none';
            }

            // if ($(".select-exp").length > 0) {
            //     var selectExp = document.querySelector(".select-exp");
            //     if (selectExp != '') {
            //         selectExp.style.display = 'none';
            //     }
            // }

            // if ($(".opt-exp" + row).length > 0) {
            //     // var optExp = document.querySelector(".opt-exp" + row);
            //     if (document.querySelector(".opt-exp" + row) != '') {
            //         document.querySelector(".opt-exp" + row).style.display = 'none';
            //     }
            // }

            window.print();
        }

        function printShow(row) {
            //console.log(row);
            var medicalCard = document.querySelector(".medical-card");
            var searchCard = document.querySelector(".search-card");

            medicalCard.style.display = null;
            searchCard.style.display = null;
            if ($('.btn-card').length > 0) {
                var btnCard = document.querySelector(".btn-card");
                if (btnCard != '') {
                    btnCard.style.display = null;
                }
            }

            // if ($('.select-exp').length > 0) {
            //     var selectExp = document.querySelector(".select-exp");
            //     if (selectExp != '') {
            //         selectExp.style.display = null;
            //     }
            // }

            // if ($(".opt-exp" + row).length > 0) {
            //     // var optExp = document.querySelector(".opt-exp" + row);
            //     if (document.querySelector(".opt-exp" + row) != '') {
            //         document.querySelector(".opt-exp" + row).style.display = null;
            //     }
            // }
        }

        function addToOrder(id) {
            // alert(id);

            var ary = JSON.parse(localStorage.getItem("items"));
            // console.log(ary);

            if (ary == null) {
                var orderAry = [id];
                localStorage.setItem("items", JSON.stringify(orderAry));

            } else {
                $con = ary.indexOf(id);
                if ($con == -1) {
                    ary.push(id);
                    localStorage.setItem("items", JSON.stringify(ary));
                }

            }

            getOrderItems();
            gotoTable();
        }

        function getOrderItems() {
            let ary = JSON.parse(localStorage.getItem("items"));
            //console.log(ary);
            return ary;

        }

        function clearOrder() {
            localStorage.removeItem("items");
            localStorage.removeItem("qtys");
        }
    </script>
    {{-- @endsection --}}

</body>

</html>
