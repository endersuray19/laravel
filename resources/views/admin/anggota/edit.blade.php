@extends('admin.layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">

        <h5>Edit Data Anggota</h5>
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Kode Anggota (readonly) -->
            <div class="form-group">
                <label>Kode Anggota</label>
                <input type="text" class="form-control" value="{{ $anggota->kode_anggota }}" readonly>
            </div>

            <!-- Nama Anggota -->
            <div class="form-group">
                <label>Nama Anggota</label>
                <input type="text" name="nama_anggota" class="form-control" value="{{ $anggota->nama_anggota }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $anggota->user->email }}" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label>Password (kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="L" {{ $anggota->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $anggota->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $anggota->alamat }}</textarea>
            </div>

            <!-- No HP -->
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $anggota->no_hp }}">
            </div>

            <!-- Tanggal Join (readonly) -->
            <div class="form-group">
                <label>Tanggal Join</label>
                <input type="date" class="form-control" value="{{ $anggota->tgl_join }}" readonly>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="aktif" {{ $anggota->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $anggota->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <!-- Foto -->
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">

                @if ($anggota->foto)
                    <div class="mt-2">
                        <img
                            src="{{  asset('storage/'.$anggota->foto) }}"
                            width="120"
                            class="img-thumbnail"
                        >
                    </div>
                @endif
            </div>


            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.anggota') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
