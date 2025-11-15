<style>
    /* Container */
    .vertical-menu {
        background: #0E2542 !important;
        padding: 10px !important;
    }

    /* Item menu utama */
    #side-menu>li>a {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        padding: 12px 16px !important;
        margin-bottom: 8px !important;
        background: #183E6F !important;
        border-radius: 10px !important;
        color: #ffffff !important;
        font-weight: 500 !important;
        transition: all .2s ease !important;
    }

    /* Hover kuning */
    #side-menu>li>a:hover {
        background: #F4C542 !important;
        color: #0E2542 !important;
        transform: translateX(4px) !important;
    }

    /* Aktif */
    #side-menu>li>a.active {
        background: #F4C542 !important;
        color: #0E2542 !important;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15) !important;
    }

    /* Icon mengikuti warna text */
    #side-menu li a i {
        color: inherit !important;
    }

    /* Submenu */
    .submenu {
        display: none !important;
        padding-left: 16px !important;
        margin-top: 6px !important;
    }

    .submenu a {
        display: block !important;
        padding: 10px 14px !important;
        margin-bottom: 6px !important;
        background: #1b4479 !important;
        color: #ffffff !important;
        border-radius: 8px !important;
        transition: .2s !important;
    }

    /* Submenu hover */
    .submenu a:hover {
        background: #F4C542 !important;
        color: #0E2542 !important;
    }

    /* Show submenu */
    li.open .submenu {
        display: block !important;
    }
</style>
<div class="vertical-menu">

    <div data-simplebar class="h-100">



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @php
                $user = Auth::user();
            @endphp

            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                @if ($user && $user->status === 'admin')
                    <li>
                        <a href="{{ route('admin.index') }}" class="{{ Route::is('dashboard.*') ? 'active' : '' }}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Dropdown 1 -->
                    <li class="has-dropdown">
                        <a href="#">
                            <i class="mdi mdi-format-list-bulleted"></i>
                            <span>Kolom Soal</span>
                        </a>

                        <div class="submenu">
                            <a href="{{ route('kelompok-soal.index') }}">List Kelompok Soal</a>
                            <a href="{{ route('kelompok-soal.create') }}">Tambah Kelompok</a>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('tarik-modul.index') }}"
                            class="{{ Route::is('tarik-modul.*') ? 'active' : '' }}">
                            <i class="mdi mdi-download-box-outline"></i>
                            <span>Soal</span>
                        </a>
                    </li>

                    <!-- Dropdown 2 -->
                    <li class="has-dropdown">
                        <a href="#">
                            <i class="mdi mdi-file-multiple-outline"></i>
                            <span>Kumpulan Modul</span>
                        </a>

                        <div class="submenu">
                            <a href="{{ route('kumpulan-modul.index') }}">List Modul</a>
                            <a href="{{ route('kumpulan-modul.create') }}">Tambah Modul</a>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('generate-kode.index') }}"
                            class="{{ Route::is('generate-kode.*') ? 'active' : '' }}">
                            <i class="mdi mdi-qrcode-edit"></i>
                            <span>Generate Kode</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('laporan.index') }}" class="{{ Route::is('laporan.*') ? 'active' : '' }}">
                            <i class="mdi mdi-file-chart"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                @endif

                @if ($user && $user->status === 'review')
                    <li>
                        <a href="{{ route('review.index') }}" class="{{ Route::is('review.*') ? 'active' : '' }}">
                            <i class="mdi mdi-eye-check-outline"></i>
                            <span>Halaman Review</span>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
<script>
    document.querySelectorAll(".has-dropdown > a").forEach(btn => {
        btn.addEventListener("click", function(e) {
            e.preventDefault();

            const li = this.parentElement;
            li.classList.toggle("open");
        });
    });
</script>
