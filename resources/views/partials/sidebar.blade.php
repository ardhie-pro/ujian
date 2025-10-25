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

                {{-- 🔹 Hanya admin yang bisa lihat semua menu di bawah --}}
                @if ($user && $user->status === 'admin')
                    <li>
                        <a href="{{ route('admin.index') }}"
                            class="waves-effect {{ Route::is('dashboard.*') ? 'active' : '' }}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kelompok-soal.index') }}"
                            class="waves-effect {{ Route::is('kelompok-soal.*') ? 'active' : '' }}">
                            <i class="mdi mdi-format-list-bulleted"></i>
                            <span>Kolom Soal</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('tarik-modul.index') }}"
                            class="waves-effect {{ Route::is('tarik-modul.*') ? 'active' : '' }}">
                            <i class="mdi mdi-download-box-outline"></i>
                            <span>Soal</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('kumpulan-modul.index') }}"
                            class="waves-effect {{ Route::is('kumpulan-modul.*') ? 'active' : '' }}">
                            <i class="mdi mdi-file-multiple-outline"></i>
                            <span>Kumpulan Modul</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('generate-kode.index') }}"
                            class="waves-effect {{ Route::is('generate-kode.*') ? 'active' : '' }}">
                            <i class="mdi mdi-qrcode-edit"></i>
                            <span>Generate Kode</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('laporan.index') }}"
                            class="waves-effect {{ Route::is('laporan.*') ? 'active' : '' }}">
                            <i class="mdi mdi-file-chart"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                @endif

                {{-- 🔹 Hanya reviewer yang bisa lihat halaman review --}}
                @if ($user && $user->status === 'review')
                    <li>
                        <a href="{{ route('review.index') }}"
                            class="waves-effect {{ Route::is('review.*') ? 'active' : '' }}">
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
