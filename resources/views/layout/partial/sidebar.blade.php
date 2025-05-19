<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/dash">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bookmark"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dash/admin/category">
                            <i class="bi bi-layout-text-window-reverse"></i><span>View Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dash/admin/category/create">
                            <i class="bi bi-bookmark-plus-fill"></i><span>Create Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-car-front-fill"></i><span>Kendaraan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dash/admin/kendaraan">
                            <i class="bi bi-layout-text-window-reverse"></i><span>View Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dash/admin/kendaraan/create">
                            <i class="bi bi-bookmark-plus-fill"></i><span>Create Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    {{-- <li>
                        <a href="/dash/admin/user">
                            <i class="bi bi-layout-text-window-reverse"></i><span>User</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/dash/admin/pegawai">
                            <i class="bi bi-layout-text-window-reverse"></i><span>Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="/dash/admin/create">
                            <i class="bi bi-layout-text-window-reverse"></i><span>Create</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-chat"></i><span>Chat</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dash/chat">
                            <i class="bi bi-circle"></i><span>View Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-ticket-detailed"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dash/booking">
                            <i class="bi bi-layout-text-window-reverse"></i><span>View Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Charts Nav -->
        @elseif (Auth::user()->role == 'pegawai')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-ticket-detailed"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dash/booking">
                            <i class="bi bi-layout-text-window-reverse"></i><span>View Data</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/dash/admin/User/create">
                            <i class="bi bi-bookmark-plus-fill"></i><span>Create Data</span>
                        </a>
                    </li> --}}
                </ul>
            </li><!-- End Charts Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-chat"></i><span>Chat</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dash/chat">
                            <i class="bi bi-circle"></i><span>View Data</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Icons Nav -->
        @elseif (Auth::user()->role == 'user')
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-car-front-fill"></i><span>Kendaraan</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dash/user/kendaraan">
                            <i class="bi bi-layout-text-window-reverse"></i><span>View Data</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/dash/admin/kendaraan/create">
                            <i class="bi bi-bookmark-plus-fill"></i><span>Create Data</span>
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-ticket-detailed"></i><span>Your Booking</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/dash/user/book">
                            <i class="bi bi-layout-text-window-reverse"></i><span>View Data</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/dash/admin/User/create">
                            <i class="bi bi-bookmark-plus-fill"></i><span>Create Data</span>
                        </a>
                    </li> --}}
                </ul>
            </li><!-- End Charts Nav -->
        @endif

    </ul>

</aside><!-- End Sidebar-->
