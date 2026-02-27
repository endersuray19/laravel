@extends('anggota.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-12">
            <h4 class="mb-0">Daftar Iuran</h4>
            <small class="text-muted">Informasi iuran yang harus dibayarkan anggota</small>
        </div>
    </div>

    <div class="row">
        @forelse ($iuran as $item)
            <div class="col-md-4 d-flex">
                <div class="card shadow-sm mb-4 w-100 d-flex flex-column">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong>{{ $item->nama_iuran }}</strong>
                        <span class="badge badge-info">
                            {{ ucfirst($item->tipe) }}
                        </span>
                    </div>

                    <div class="card-body flex-grow-1">
                        <h5 class="text-primary mb-3">
                            Rp {{ number_format($item->nominal, 0, ',', '.') }}
                        </h5>

                        @if ($item->bisa_dicicil)
                            <span class="badge badge-success">
                                Bisa Dicicil ({{ $item->max_cicilan }}x)
                            </span>
                            <p class="text-muted mt-2 mb-0">
                                Pembayaran dapat dilakukan hingga
                                <strong>{{ $item->max_cicilan }}</strong> kali cicilan.
                            </p>
                        @else
                            <span class="badge badge-secondary">
                                Tidak Bisa Dicicil
                            </span>
                            <p class="text-muted mt-2 mb-0">
                                Pembayaran harus dilakukan sekaligus.
                            </p>
                        @endif
                    </div>

                    @php
                        // ambil tagihan terakhir jika ada
                        $tagihanTerakhir = $item->tagihan->last();

                        // ambil pembayaran terakhir dari tagihan
                        $pembayaranTerakhir = $tagihanTerakhir?->pembayaranTerakhir;
                    @endphp

                    <div class="card-footer text-right">

                        @if ($pembayaranTerakhir)
                            <a href="{{ route(
                                'iuran.transaksi.detail',
                                $pembayaranTerakhir->order_id
                            ) }}"
                            class="btn btn-info btn-sm">
                                Detail Transaksi
                            </a>
                        @else
                            <a href="{{ route('iuran.bayar', $item->id) }}"
                            class="btn btn-primary btn-sm">
                                Bayar
                            </a>
                        @endif

                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Data iuran belum tersedia.
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection
