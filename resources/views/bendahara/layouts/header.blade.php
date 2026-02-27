<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link font-weight-bold">
                SISTEM INFORMASI KEUANGAN KOPERASI
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="dropdown-toggle " href="javascript:void(0)" data-toggle="dropdown">
                <i class="fas fa-user mr-2"></i> &nbsp;<span>
                    Administrator</span> &nbsp;
                <i class="icon-submenu lnr lnr-chevron-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right panahatas mt-3 mr-1">
                <div class="dropdown-divider"></div>
                {{-- <a class="dropdown-item" data-toggle="modal" href="javascript:void(0)" data-target="#lihatprofile">
                    <i class="fas fa-user mr-2"></i>
                    Lihat Profil
                </a> --}}
                <div class="dropdown-divider"></div>
                <a href="/password" class="dropdown-item">
                    <i class="fas fa-user-cog mr-2"></i>
                    Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="/proseslogout" id="logout" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>

<script>
    document.getElementById('logout').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Keluar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika konfirmasi diterima, redirect ke halaman logout
                window.location.href = '/proseslogout';
            }
        });
    });
</script>
