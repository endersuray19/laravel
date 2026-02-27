<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset ('assets/dist/img/logo-esta-vet.png') }}" class="brand-image">
        <span class="brand-text font-weight-light">SIPO</span>
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
                    <a href="{{ route('iuran.index') }}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>
                        Iuran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/obatmasuk" class="nav-link">
                        <i class="fas fa-wallet nav-icon"></i>
                        <p>
                        Riwayat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/obatmasuk" class="nav-link">
                        <i class="fas fa-receipt nav-icon"></i>
                        <p>
                        Pengaturan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
