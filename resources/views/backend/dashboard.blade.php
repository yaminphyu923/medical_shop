@extends('backend.main')

@section('dashboard-active', 'active')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <div class="card card-title">
                    <div class="card-header"><b>Dashboard</b></div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('customers.index') }}">
                    <div class="card hover-card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fas fa-users opacity-10"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="mb-0"><b>Customers</b></p>
                                <br>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0 text-end"><span
                                    class="badge bg-warning text-dark">{{ number_format($customer_count) }}
                                </span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="{{ route('medical-lists.index') }}">
                    <div class="card hover-card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="mb-0"><b>Medical Lists</b></p>
                                <br>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0 text-end"><span
                                    class="badge bg-warning text-dark">{{ number_format($medicallist_count) }}
                                </span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <a href="">
                    <div class="card hover-card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="mb-0 text-capitalize"><b>User Management</b></p>
                                <br>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0 text-end"><span
                                    class="badge bg-warning text-dark">{{ number_format($user_count) }}
                                </span></p>
                        </div>
                    </div>
                </a>
            </div>
            {{-- <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Sales</p>
                            <h4 class="mb-0">$103,430</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                            </span>than yesterday</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
