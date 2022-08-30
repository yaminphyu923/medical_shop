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
    {{-- <style>
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
        }
    </style> --}}
</head>

<body class="g-sidenav-show  bg-gray-200">
    {{-- @include('backend.sidebar') --}}
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        @include('sweetalert::alert')
        {{-- onmousemove="printShow()" --}}

        <div class="container-fluid">

            <div class="row search-card my-1">

                <div class="col-sm-6">
                    <form action="{{ route('cal-search') }}" method="GET">
                        @csrf

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Enter Name..." autocomplete="off" value="{{ request()->search }}">
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

                <div class="col-sm-12 my-3">
                    <a href="{{ route('cal-index') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">All</button></a>
                    <a href="{{ route('cal-alpha-search', 'A') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">A</button></a>
                    <a href="{{ route('cal-alpha-search', 'B') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">B</button></a>
                    <a href="{{ route('cal-alpha-search', 'C') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">C</button></a>
                    <a href="{{ route('cal-alpha-search', 'D') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">D</button></a>
                    <a href="{{ route('cal-alpha-search', 'E') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">E</button></a>
                    <a href="{{ route('cal-alpha-search', 'F') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">F</button></a>
                    <a href="{{ route('cal-alpha-search', 'G') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">G</button></a>
                    <a href="{{ route('cal-alpha-search', 'H') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">H</button></a>
                    <a href="{{ route('cal-alpha-search', 'I') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">I</button></a>
                    <a href="{{ route('cal-alpha-search', 'J') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">J</button></a>
                    <a href="{{ route('cal-alpha-search', 'K') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">K</button></a>
                    <a href="{{ route('cal-alpha-search', 'L') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">L</button></a>
                    <a href="{{ route('cal-alpha-search', 'M') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">M</button></a>
                    <a href="{{ route('cal-alpha-search', 'N') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">N</button></a>
                    <a href="{{ route('cal-alpha-search', 'O') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">O</button></a>
                    <a href="{{ route('cal-alpha-search', 'P') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">P</button></a>
                    <a href="{{ route('cal-alpha-search', 'Q') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">Q</button></a>
                    <a href="{{ route('cal-alpha-search', 'R') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">R</button></a>
                    <a href="{{ route('cal-alpha-search', 'S') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">S</button></a>
                    <a href="{{ route('cal-alpha-search', 'T') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">T</button></a>
                    <a href="{{ route('cal-alpha-search', 'U') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">U</button></a>
                    <a href="{{ route('cal-alpha-search', 'V') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">V</button></a>
                    <a href="{{ route('cal-alpha-search', 'W') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">W</button></a>
                    <a href="{{ route('cal-alpha-search', 'X') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">X</button></a>
                    <a href="{{ route('cal-alpha-search', 'Y') }}"><button type="button"
                            class="btn btn-sm btn-info btn-radius">Y</button></a>
                    <a href="{{ route('cal-alpha-search', 'Z') }}"><button type="button"
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

                                            @if ($medical_list->photo)
                                                <img src="{{ asset('icons/stock_photos/' . $medical_list->photo) }}"
                                                    class="order-photo" alt="">
                                            @else
                                                <p class="text-danger text-center"><b>No Photo</b></p>
                                            @endif
                                            <div class="d-flex justify-content-end">
                                                {{-- <a href="{{ route('add-session-cart', $medical_list->id) }}"> --}}
                                                <button type="button" class="btn btn-order btn-info"
                                                    disabled>Order</button>
                                                {{-- </a> --}}
                                            </div>

                                        </div>
                                        <div class="card-footer p-1">

                                            <div class="d-flex justify-content-between">
                                                <p class="m-0 pl-3"><b>{{ $medical_list->name }}</b></p>
                                                <p class="badge bg-info mt-1"><b>Qty -
                                                        {{ number_format($medical_list->total_qty) }}</b>
                                                </p>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                @if ($medical_list->total_qty > 0)
                                                    <p class="badge bg-danger mt-0">
                                                        Exp-{{ date('M-d-Y', strtotime($medical_list->expired_date)) }}
                                                        Qty-{{ $medical_list->total_qty }}</p>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    {{ $medical_lists->links('pagination::bootstrap-4') }}
                </div>



                <div class="col-sm-5 ordercal-list" style="margin-top: -80px !important;">
                    <form action="{{ route('order-update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="d-flex justify-content-between my-3">
                            <h4><b>Order List</b></h4>

                            <div class="justify-content-end">
                                {{-- <button type="submit" class="btn btn-success btn-sm cal">Calculate</button> --}}
                                <button type="submit" class="btn btn-success btn-sm">Save&Print</button>
                            </div>
                        </div>


                        <table class="table table-stripped table-hover">
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
                                        <td>{{ $od->medicalList->name }}</td>
                                        <td>{{ number_format($od->price) }}</td>
                                        <td>{{ $od->qty }}</td>
                                        <td>{{ number_format((int) $od->price * (int) $od->qty) }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="4">
                                        <div class="form-group d-flex justify-content-end">
                                            <div class="col-sm-2">
                                                <label for=""><b>Grand Total</b></label>
                                            </div>

                                            <div class="col-sm-6">
                                                <p id="gt">{{ $grand_total }}</p>
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                        <div class="form-group row">
                                            <div class="col-sm-2">
                                                <label for="customer_id"><b>Customer</b></label>
                                            </div>

                                            <div class="col-sm-6">
                                                <select name="customer_id" id="customer_id"
                                                    class="form-control myselect">
                                                    <option>Select Customer...</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}"
                                                            @if ($customer->id == request()->customer_id) selected @endif>
                                                            {{ $customer->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @php

                                                $order = App\Models\Order::where('customer_id', request()->customer_id)
                                                    ->latest('id')
                                                    ->first();

                                            @endphp

                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-sm btn-success"
                                                    onclick='window.location.reload();'>Reload</button>

                                                <a href="{{ route('customers.index') }}" target="_blank"><button
                                                        type="button" class="btn btn-success"><i
                                                            class="fas fa-plus-circle"></i>
                                                        <b>Create</b></button></a>

                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">
                                        <div class="form-group row">

                                            <div class="col-sm-2">
                                                <label for="note"><b>Pay Money</b></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="pay_money" id="pay_money"
                                                    class="form-control" autocomplete="off" required>
                                            </div>

                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-sm btn-success sum">=</button>
                                            </div>


                                            <div class="col-sm-2">
                                                <label for="note"><b>Debt Money</b></label>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="debt_money" id="note"
                                                    class="form-control"
                                                    value="{{ $order != null ? $order->debt_money : '' }}"
                                                    autocomplete="off">
                                            </div>




                                            <div class="col-sm-1 p-0">
                                                <input type="checkbox" id="debt" name="debt"
                                                    class="text-end" value="Yes">
                                                <label for="debt"><b>Debt</b></label>
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </form>
                </div>


            </div>

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

        $('#customer_id').change(function() {
            var customer_id = $('#customer_id').val();
            history.pushState(null, '', `?customer_id=${customer_id}`);
            window.location.reload();
        })

        $('.sum').on('click', function() {
            var grand_total = $('#gt').text();
            var pay_money = $('#pay_money').val();
            var debt_money = $('#note').val();

            if (debt_money) {
                var debt = (parseInt(grand_total) + parseInt(debt_money)) - parseInt(pay_money);
            } else {
                var debt = parseInt(grand_total) - parseInt(pay_money);
            }

            $('#note').val(debt);
        })

        // $('.cal').on('click', function() {
        //     $('.ordercal-list').hide();
        //     $('.order-list').show();
        // });

        // $('#page-top').on('mouseover', function() {
        //     $('.print-btn').show();
        // })
    </script>

    <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.2') }}"></script>
    <script></script>
</body>

</html>
