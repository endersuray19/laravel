@extends('admin.layouts.admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard 21</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Jumlah Anggota -->
            <div class="col-md-3 px-1">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-users"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Anggota</span>
                        <span class="info-box-number">
                            10
                        </span>
                    </div>
                </div>
            </div>

            <!-- Pendapatan -->
            <div class="col-md-3 px-1">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-money-bill-wave"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pendapatan Bulan Ini</span>
                        <span class="info-box-number">
                            Rp 10.000.000
                        </span>
                    </div>
                </div>
            </div>

            <!-- Pengeluaran -->
            <div class="col-md-3 px-1">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-receipt"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengeluaran Bulan Ini</span>
                        <span class="info-box-number">
                            Rp 1.500.000
                        </span>
                    </div>
                </div>
            </div>

            <!-- Saldo -->
            <div class="col-md-3 px-1">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1">
                        <i class="fas fa-wallet"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Saldo</span>
                        <span class="info-box-number">
                            Rp 50.000.000
                        </span>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid mt-4">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">

                    <!-- Header -->
                    <h5 class="fw-semibold mb-4">Transaksi Hari Ini</h5>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="border-bottom">
                                <tr class="text-muted small">
                                    <th>Kode Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Jenis Iuran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Tgl Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-semibold">WD-12345</td>

                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img
                                                src="https://randomuser.me/api/portraits/men/32.jpg"
                                                alt="avatar"
                                                width="36"
                                                height="36"
                                                class="rounded-circle"
                                            >
                                            <span class="fw-medium">Admin</span>
                                        </div>
                                    </td>

                                    <td>Produk A 1</td>

                                    <td>
                                        <span class="badge px-3 py-2 rounded-3"
                                            style="background:#5ad2b0;color:#fff;">
                                            PENDING
                                        </span>
                                    </td>

                                    <td>Senin, 10 Mei 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body">

                        <h5 class="fw-semibold mb-3">
                            Pemasukan & Pengeluaran
                        </h5>

                        <div class="d-flex justify-content-center">
                            <div style="width:260px;">
                                <canvas id="chartKeuangan" height="260"></canvas>
                            </div>
                        </div>

                        <div class="row text-center mt-4">
                            <div class="col-6">
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background:#22c55e;color:#fff;">
                                    Pemasukan
                                </span>
                            </div>
                            <div class="col-6">
                                <span class="badge rounded-pill px-3 py-2"
                                    style="background:#ef4444;color:#fff;">
                                    Pengeluaran
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 g-4">

            <!-- Pemasukan -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body">
                        <h5 class="fw-semibold mb-3">Grafik Pemasukan Kas</h5>
                        <canvas id="chartPemasukanBar" height="180"></canvas>
                    </div>
                </div>
            </div>

            <!-- Pengeluaran -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body">
                        <h5 class="fw-semibold mb-3">Grafik Pengeluaran Kas</h5>
                        <canvas id="chartPengeluaranBar" height="180"></canvas>
                    </div>
                </div>
            </div>

        </div>




    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {

    new Chart(document.getElementById('chartKeuangan'), {
        type: 'doughnut',
        data: {
            labels: ['Pemasukan', 'Pengeluaran'],
            datasets: [{
                data: [65, 35],
                backgroundColor: ['#22c55e', '#ef4444'],
                borderWidth: 0
            }]
        },
        options: {
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 14,
                        padding: 20
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(ctx) {
                            return ctx.label + ': ' + ctx.parsed + '%';
                        }
                    }
                }
            }
        }
    });

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Grafik Pemasukan
    new Chart(document.getElementById('chartPemasukanBar'), {
        type: 'bar',
        data: {
            labels: ['2019','2020','2021','2022','2023','2024'],
            datasets: [{
                label: 'Pemasukan Kas',
                data: [10, 18, 3, 5, 8, 4],
                backgroundColor: 'rgba(59,130,246,0.45)',
                borderColor: 'rgba(59,130,246,1)',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 5 }
                }
            }
        }
    });

    // Grafik Pengeluaran
    new Chart(document.getElementById('chartPengeluaranBar'), {
        type: 'bar',
        data: {
            labels: ['2019','2020','2021','2022','2023','2024'],
            datasets: [{
                label: 'Pengeluaran Kas',
                data: [6, 12, 7, 9, 5, 6],
                backgroundColor: 'rgba(239,68,68,0.45)',
                borderColor: 'rgba(239,68,68,1)',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 5 }
                }
            }
        }
    });

});
</script>


@endsection
