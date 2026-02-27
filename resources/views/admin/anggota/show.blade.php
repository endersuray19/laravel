@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>Detail Anggota</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- FOTO -->
                <div class="col-md-4 text-center">
                    @if ($anggota->foto)
                        <img src="{{ asset('storage/'.$anggota->foto) }}"
                             class="img-thumbnail mb-3"
                             width="200">
                    @else
                        <img src="{{ asset('assets/dist/img/no_foto.jpg') }}"
                             class="img-thumbnail mb-3"
                             width="200">
                    @endif
                </div>

                <!-- DATA -->
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200">Kode Anggota</th>
                            <td>: {{ $anggota->kode_anggota }}</td>
                        </tr>
                        <tr>
                            <th>Nama Anggota</th>
                            <td>: {{ $anggota->nama_anggota }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: {{ $anggota->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: {{ $anggota->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $anggota->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td>: {{ $anggota->no_hp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Join</th>
                            <td>: {{ \Carbon\Carbon::parse($anggota->tgl_join)->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                <span class="badge badge-{{ $anggota->status == 'aktif' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($anggota->status) }}
                                </span>
                            </td>
                        </tr>
                    </table>

                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
