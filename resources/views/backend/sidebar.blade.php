<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ asset('icons/medicine.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            {{-- ရန်ကင်းအောင် --}}
            <span class="ms-1 font-weight-bold text-white">NEO</span><br>
            {{-- <span class="font-weight-bold text-white" style="font-size: 11px;">
                <small>အထူးကုဆေးခန်းနှင့်အဆင့်မြင့်ရောဂါရှာဖွေရေးစင်တာ</small>
            </span> --}}
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main"
        style="height:100vh !important;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white @yield('dashboard-active')" href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-box"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @yield('customer-active')" href="{{ route('customers.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @yield('medicallist-active')" href="{{ route('medical-lists.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <span class="nav-link-text ms-1">Medical Lists</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @yield('expired-medicallist-active')" href="{{ route('expiredList') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <span class="nav-link-text ms-1">Expired Medical Lists</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @yield('qtyList-active')" href="{{ route('qtyList') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <span class="nav-link-text ms-1">Qty Warning Medical Lists</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @yield('medicalorder-active')" href="{{ route('orders.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="nav-link-text ms-1">Medical Order</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white @yield('orderlist-active')" href="{{ route('order-lists') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="nav-link-text ms-1">Order List</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white @yield('voucherlist-active')" href="{{ route('voucher-list') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="nav-link-text ms-1">Voucher List</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white @yield('usermanagement-active')" href="{{ route('users.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-address-book"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
