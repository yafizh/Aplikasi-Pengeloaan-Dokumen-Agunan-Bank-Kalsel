<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
        <li
            class="nav-item {{ active_class(['lemari', 'lemari/create', 'lemari/edit', 'lemari/show', 'lemari-detail/create', 'lemari-detail/edit']) }}">
            <a class="nav-link" href="{{ url('/lemari') }}">
                <i class="menu-icon mdi mdi-table-large"></i>
                <span class="menu-title">Lemari</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['nasabah', 'nasabah/create', 'nasabah/edit']) }}">
            <a class="nav-link" href="{{ url('/nasabah') }}">
                <i class="menu-icon mdi mdi-table-large"></i>
                <span class="menu-title">Nasabah</span>
            </a>
        </li>
        <li class="nav-item {{ active_class(['pegawai', 'pegawai/create', 'pegawai/edit']) }}">
            <a class="nav-link" href="{{ url('/pegawai') }}">
                <i class="menu-icon mdi mdi-table-large"></i>
                <span class="menu-title">Pegawai</span>
            </a>
        </li>
        <li
            class="nav-item {{ active_class([
                'dokumen-agunan',
                'dokumen-agunan/create',
                'dokumen-agunan/edit',
                'dokumen-agunan-peminjaman',
                'dokumen-agunan-peminjaman/create',
                'dokumen-agunan-peminjaman/edit',
                'dokumen-agunan-pengembalian',
                'dokumen-agunan-pengembalian/create',
                'dokumen-agunan-pengembalian/edit',
            ]) }}">
            <a class="nav-link" data-toggle="collapse" href="#basic-ui"
                aria-expanded="{{ is_active_route([
                    'dokumen-agunan',
                    'dokumen-agunan/create',
                    'dokumen-agunan/edit',
                    'dokumen-agunan-peminjaman',
                    'dokumen-agunan-peminjaman/create',
                    'dokumen-agunan-peminjaman/edit',
                    'dokumen-agunan-pengembalian',
                    'dokumen-agunan-pengembalian/create',
                    'dokumen-agunan-pengembalian/edit',
                ]) }}"
                aria-controls="basic-ui">
                <i class="menu-icon mdi mdi-table-large"></i>
                <span class="menu-title">Dokumen Agunan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class([
                'dokumen-agunan',
                'dokumen-agunan/create',
                'dokumen-agunan/edit',
                'dokumen-agunan-peminjaman',
                'dokumen-agunan-peminjaman/create',
                'dokumen-agunan-peminjaman/edit',
                'dokumen-agunan-pengembalian',
                'dokumen-agunan-pengembalian/create',
                'dokumen-agunan-pengembalian/edit',
            ]) }}"
                id="basic-ui">
                <ul class="nav flex-column sub-menu">
                    <li
                        class="nav-item {{ active_class(['dokumen-agunan', 'dokumen-agunan/create', 'dokumen-agunan/edit']) }}">
                        <a class="nav-link" href="{{ url('/dokumen-agunan') }}">Dokumen Agunan</a>
                    </li>
                    <li
                        class="nav-item {{ active_class([
                            'dokumen-agunan-peminjaman',
                            'dokumen-agunan-peminjaman/create',
                            'dokumen-agunan-peminjaman/edit',
                        ]) }}">
                        <a class="nav-link" href="{{ url('/dokumen-agunan-peminjaman') }}">Peminjaman</a>
                    </li>
                    <li
                        class="nav-item {{ active_class([
                            'dokumen-agunan-pengembalian',
                            'dokumen-agunan-pengembalian/create',
                            'dokumen-agunan-pengembalian/edit',
                        ]) }}">
                        <a class="nav-link" href="{{ url('/dokumen-agunan-pengembalian') }}">Pengembalian</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ active_class(['laporan/*']) }}">
            <a class="nav-link" data-toggle="collapse" href="#user-pages"
                aria-expanded="{{ is_active_route(['laporan/*']) }}" aria-controls="user-pages">
                <i class="menu-icon mdi mdi-table-large"></i>
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
                </ul>
            </div>
        </li>
    </ul>
</nav>
