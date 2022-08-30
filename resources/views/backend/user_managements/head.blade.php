<div class="container-fluid py-2">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-title">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="text-light"><b>@yield('list-title')</b></h5>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('users.index') }}">
                            <button type="button" class="btn btn-sm btn-success @yield('user-active')">
                                <b>🙎‍♂️ Users</b></button>&nbsp;
                        </a>

                        <a href="{{ route('roles.index') }}">
                            <button type="button" class="btn btn-sm btn-success @yield('role-active')"><b>📁
                                    Role</b></button>&nbsp;
                        </a>

                        <a href="{{ route('permissions.index') }}">
                            <button type="button" class="btn btn-sm btn-success @yield('permission-active')"">
                                <b>🅿 Permission</b></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
