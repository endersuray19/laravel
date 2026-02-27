@extends('anggota.layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card shadow-sm">
                <div class="card-header">
                    <strong>Pembayaran Iuran</strong>
                </div>

                <div class="card-body">
                    <p><strong>{{ $iuran->nama_iuran }}</strong></p>

                    <p>
                        Total Iuran :
                        <span class="text-primary">
                            Rp {{ number_format($tagihan->total_nominal,0,',','.') }}
                        </span>
                    </p>

                    @if($iuran->bisa_dicicil)
                        <div class="alert alert-info">
                            Iuran ini <strong>bisa dicicil</strong>
                            maksimal {{ $tagihan->total_cicilan }} kali.
                        </div>

                        <form>
                            <div class="form-group">
                                <label>Cicilan Ke</label>
                                <input type="number"
                                       class="form-control"
                                       value="1"
                                       readonly>
                            </div>

                            <div class="form-group">
                                <label>Nominal Cicilan</label>
                                <input type="number"
                                       class="form-control"
                                       placeholder="Masukkan nominal cicilan">
                                <small class="text-muted">
                                    Contoh: 50000
                                </small>
                            </div>

                            <div class="form-group">
                                <label>Sisa Iuran Setelah Pembayaran</label>
                                <input type="text"
                                       class="form-control"
                                       value="Rp {{ number_format($tagihan->total_nominal,0,',','.') }}"
                                       readonly>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-warning">
                            Iuran ini <strong>tidak bisa dicicil</strong>.
                            Pembayaran harus lunas.
                        </div>

                        <div class="form-group">
                            <label>Nominal Pembayaran</label>
                            <input type="text"
                                   class="form-control"
                                   value="Rp {{ number_format($tagihan->total_nominal,0,',','.') }}"
                                   readonly>
                        </div>
                    @endif
                </div>

                {{-- <div class="card-footer text-right">
                    <button class="btn btn-success btn-sm">
                        Bayar Sekarang
                    </button>

                    <a href="{{ route('iuran.index') }}" class="btn btn-secondary btn-sm">
                        Kembali
                    </a>
                </div> --}}
                <form action="{{ route('iuran.prosesBayar', $iuran->id) }}" method="POST">
    @csrf

    @if($iuran->bisa_dicicil)
        <input type="number"
               name="nominal_bayar"
               class="form-control mb-2"
               placeholder="Masukkan nominal cicilan"
               required>
    @endif

    <button class="btn btn-success btn-sm">
        Bayar Sekarang
    </button>

    <a href="{{ route('iuran.index') }}" class="btn btn-secondary btn-sm">
        Kembali
    </a>
</form>


            </div>

        </div>
    </div>
</div>
@endsection
