<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="/dashboard" class="app-brand-link">
            <img src="{{ asset('') }}storage/images/logo/{{ Helper::apk()->logo }}" alt=""
                style="width: 100%;">

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    @if (request()->user()->role == 1)
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="/dashboard" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboards</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-book"></i>
                    <div>Master data</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="/admin" class="menu-link">
                            <div>Admin</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="/siswa" class="menu-link">
                            <div>Siswa</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="menu-item">
                <a href="/pembayaran" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Pembayaran</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bx-cog'></i>
                    <div>Setting</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="/aplikasi" class="menu-link">
                            <div>Aplikasi</div>
                        </a>
                    </li>
                </ul>
                <ul class="menu-sub">
                    <li class="menu-item ">
                        <a href="/tahun" class="menu-link">
                            <div>Tahun Ajaran</div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    @elseif (request()->user()->role == 2)
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="/dashboard" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Dashboards</div>
                </a>
            </li>
        </ul>
    @else
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="/dashboard" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div>Laporan</div>
                </a>
            </li>
        </ul>
    @endif

</aside>
