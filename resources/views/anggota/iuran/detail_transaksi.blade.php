@extends('anggota.layouts.admin')

@section('content')
<div class="container">

    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0">Detail Transaksi Iuran</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered">

                <tr>
                    <th>Nama Iuran</th>
                    <td>{{ $tagihan->jenisIuran->nama_iuran }}</td>
                </tr>

                <tr>
                    <th>Jenis Pembayaran</th>
                    <td>
                        @if ($tagihan->jenisIuran->bisa_dicicil)
                            Cicilan
                        @else
                            Pembayaran Sekali
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Order ID</th>
                    <td>{{ $pembayaran->order_id }}</td>
                </tr>

                {{-- TAMPIL HANYA JIKA IURAN BISA DICICIL --}}
                @if ($tagihan->jenisIuran->bisa_dicicil)
                <tr>
                    <th>Cicilan Ke</th>
                    <td>
                        {{ $pembayaran->cicilan_ke }}
                        dari {{ $tagihan->total_cicilan }}
                    </td>
                </tr>
                @endif

                <tr>
                    <th>Nominal Dibayar</th>
                    <td>
                        Rp {{ number_format($pembayaran->nominal_bayar,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Metode Pembayaran</th>
                    <td>
                        {{ $pembayaran->payment_method
                            ? strtoupper(str_replace('_', ' ', $pembayaran->payment_method))
                            : '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>
                        @if ($pembayaran->status === 'success')
                            <span class="badge badge-success">Berhasil</span>
                        @elseif ($pembayaran->status === 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @else
                            <span class="badge badge-danger">Gagal</span>
                        @endif
                    </td>
                </tr>

                <tr>
                    <th>Total Iuran</th>
                    <td>
                        Rp {{ number_format($tagihan->total_nominal,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Total Sudah Dibayar</th>
                    <td>
                        Rp {{ number_format($totalDibayar,0,',','.') }}
                    </td>
                </tr>

                <tr>
                    <th>Sisa Tagihan</th>
                    <td>
                        Rp {{ number_format($sisaTagihan,0,',','.') }}
                    </td>
                </tr>

            </table>
        </div>

        <div class="card-footer text-right">
            <a href="{{ route('iuran.index') }}" class="btn btn-secondary btn-sm">
                Kembali
            </a>
        </div>
    </div>

</div>
@endsection
