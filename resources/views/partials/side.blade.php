<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">KASIR</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <span class="nav-link text-black">
                        @if (session('user')->peran == 1)
                            ADMIN - {{ session('user')->nama }}
                        @elseif (session('user')->peran == 2)
                            PETUGAS - {{ session('user')->nama }}
                        @endif
                    </span>
                </li>
            </ul>

            <hr class="my-2">

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2 active" href="{{ route('dashboard.index') }}">
                        <i class="bi bi-house-fill"></i> Dashboard
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2" href="{{ route('pembelian.index') }}">
                        <i class="bi bi-pencil-square"></i> Pembelian
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2" href="{{ route('produk.index') }}">
                        <i class="bi bi-box"></i> Master Produk
                    </a>
                </li>
            </ul>
            @if (session('user')->peran == 1)
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" href="{{ route('pengguna.index') }}">
                            <i class="bi bi-universal-access"></i> Master Pengguna
                        </a>
                    </li>
                </ul>
            @endif
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2" href="{{ route('pelanggan.index') }}">
                        <i class="bi bi-incognito"></i> Master Pelanggan
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex gap-2" href="{{ route('riwayat.index') }}">
                        <i class="bi bi-calendar-week"></i> Riwayat
                    </a>
                </li>
            </ul>
            @if (session('user')->peran == 1)
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" href="{{ route('laporan.index') }}">
                            <i class="bi bi-list-task"></i> Laporan
                        </a>
                    </li>
                </ul>
            @endif

            <hr class="my-2">

            <ul class="nav flex-column mb-auto">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link d-flex gap-2" href="{{ route('auth.logout.process') }}">
                            <i class="bi bi-box-arrow-in-left"></i> Keluar
                        </a>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</div>
