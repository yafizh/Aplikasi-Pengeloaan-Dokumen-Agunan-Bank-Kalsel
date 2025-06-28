<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ active_class(['/']) }}">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['pegawai', 'pegawai/*']) }}">
            <a class="nav-link" href="{{ url('/pegawai') }}">
                <i class="menu-icon mdi mdi-account-outline"></i>
                <span class="menu-title">Pegawai</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['nasabah', 'nasabah/*']) }}">
            <a class="nav-link" href="{{ url('/nasabah') }}">
                <i class="menu-icon mdi mdi-account-multiple-outline"></i>
                <span class="menu-title">Nasabah</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['lemari', 'lemari/*', 'lemari-detail/*']) }}">
            <a class="nav-link" href="{{ url('/lemari') }}">
                <i class="menu-icon mdi mdi-cube-outline"></i>
                <span class="menu-title">Lemari</span>
            </a>
        </li>
        <li
            class="nav-item {{ active_class([
                'dokumen-agunan',
                'dokumen-agunan/*',
                'dokumen-agunan-peminjaman',
                'dokumen-agunan-peminjaman/*',
                'dokumen-agunan-pengembalian',
                'dokumen-agunan-pengembalian/*',
            ]) }}">
            <a class="nav-link" data-toggle="collapse" href="#basic-ui"
                aria-expanded="{{ is_active_route([
                    'dokumen-agunan',
                    'dokumen-agunan/*',
                    'dokumen-agunan-peminjaman',
                    'dokumen-agunan-peminjaman/*',
                    'dokumen-agunan-pengembalian',
                    'dokumen-agunan-pengembalian/*',
                ]) }}"
                aria-controls="basic-ui">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Dokumen Agunan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class([
                'dokumen-agunan',
                'dokumen-agunan/*',
                'dokumen-agunan-peminjaman',
                'dokumen-agunan-peminjaman/*',
                'dokumen-agunan-pengembalian',
                'dokumen-agunan-pengembalian/*',
            ]) }}"
                id="basic-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ active_class(['dokumen-agunan', 'dokumen-agunan/*']) }}">
                        <a class="nav-link" href="{{ url('/dokumen-agunan') }}">Dokumen Agunan</a>
                    </li>
                    <li
                        class="nav-item {{ active_class(['dokumen-agunan-peminjaman', 'dokumen-agunan-peminjaman/*']) }}">
                        <a class="nav-link" href="{{ url('/dokumen-agunan-peminjaman') }}">Peminjaman</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ active_class(['laporan/*']) }}">
            <a class="nav-link" data-toggle="collapse" href="#user-pages"
                aria-expanded="{{ is_active_route(['laporan/*']) }}" aria-controls="user-pages">
                <i class="menu-icon mdi mdi-file-pdf"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class(['laporan/*']) }}" id="user-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ active_class(['laporan/daftar-agunan']) }}">
                        <a class="nav-link text-wrap" href="{{ url('/laporan/daftar-agunan') }}">Daftar Agunan</a>
                    </li>
                    <li class="nav-item {{ active_class(['laporan/status-verifikasi']) }}">
                        <a class="nav-link text-wrap" href="{{ url('/laporan/status-verifikasi') }}">
                            Status Verifikasi Dokumen Agunan
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['laporan/masa-berlaku']) }}">
                        <a class="nav-link text-wrap" href="{{ url('/laporan/masa-berlaku') }}">
                            Masa Berlaku Dokumen Agunan
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['laporan/peminjaman-pengembalian']) }}">
                        <a class="nav-link text-wrap" href="{{ url('/laporan/peminjaman-pengembalian') }}">
                            Peminjaman dan Pengembalian Dokumen Agunan
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['laporan/letak-dokumen-agunan']) }}">
                        <a class="nav-link text-wrap" href="{{ url('/laporan/letak-dokumen-agunan') }}">
                            Letak Dokumen Agunan
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['laporan/ketersediaan-ruang-penyimpanan']) }}">
                        <a class="nav-link text-wrap" href="{{ url('/laporan/ketersediaan-ruang-penyimpanan') }}">
                            Ketersediaan Ruang Penyimpanan Dokumen Agunan
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['laporan/nasabah']) }}">
                        <a class="nav-link text-wrap" href="{{ url('/laporan/nasabah') }}">
                            Nasabah
                        </a>
                    </li>
                    <li class="nav-item {{ active_class(['laporan/pegawai']) }}">
                        <a class="nav-link text-wrap" href="{{ url('/laporan/pegawai') }}">
                            Pegawai
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
