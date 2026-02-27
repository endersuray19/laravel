<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset ('assets/dist/img/logo-esta-vet.png') }}" class="brand-image">
        <span class="brand-text font-weight-light">SIKK</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar" style="background: linear-gradient(145deg, #309bd8, #ffffff);">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.anggota')}}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>
                        Anggota
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.jenis_iuran.index')}}" class="nav-link">
                        <i class="fas fa-wallet nav-icon"></i>
                        <p>
                        Jenis Iuran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/obatmasuk" class="nav-link">
                        <i class="fas fa-receipt nav-icon"></i>
                        <p>
                        Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/keluar" class="nav-link">
                        <i class="fas fa-file-invoice-dollar nav-icon"></i>
                        <p>
                        Pemasukan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/keluar" class="nav-link">
                        <i class="fas fa-file-invoice nav-icon"></i>
                        <p>
                        Pengeluaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                          Laporan
                          <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/laporan/obatmasuk" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i>
                                 <p>Laporan Pemasukan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/laporan/obatkeluar" class="nav-link">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>Laporan Pengeluaran</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/laporan/exp" class="nav-link" id="Deskripsi">
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>Laporan Expired</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/pengguna" class="nav-link">
                        <i class="far fa-user nav-icon"></i>
                        <p>Data Users</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
