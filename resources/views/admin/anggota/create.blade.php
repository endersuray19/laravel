@extends('admin.layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Tambah Data Anggota</h5>
    </div>

    <div class="card-body">

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('anggota.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label>Nama Anggota</label>
                <input type="text"
                       name="nama_anggota"
                       class="form-control"
                       value="{{ old('nama_anggota') }}"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}"
                       required>
                <small class="text-muted">
                    Password default anggota: <b>12345678</b>
                </small>
            </div>

            <div class="form-group mb-3">
                <label>Kode Anggota</label>
                <input type="text"
                       name="kode_anggota"
                       class="form-control"
                       value="{{ old('kode_anggota') }}"
                       required>
            </div>

            <div class="form-group mb-3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin"
                        class="form-control"
                        required>
                    <option value="">-- Pilih --</option>
                    <option value="L" {{ old('jenis_kelamin')=='L'?'selected':'' }}>
                        Laki-laki
                    </option>
                    <option value="P" {{ old('jenis_kelamin')=='P'?'selected':'' }}>
                        Perempuan
                    </option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>No HP</label>
                <input type="text"
                       name="no_hp"
                       class="form-control"
                       value="{{ old('no_hp') }}">
            </div>

            <div class="form-group mb-3">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          rows="3">{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label>Tanggal Join</label>
                <input type="date"
                       name="tgl_join"
                       class="form-control"
                       value="{{ old('tgl_join') }}"
                       required>
            </div>

            <div class="form-group mb-4">
                <label>Foto Anggota</label>
                <input type="file"
                       name="foto"
                       class="form-control"
                       accept="image/*">
                <small class="text-muted">
                    Format: jpg, jpeg, png (max 2MB)
                </small>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="{{ route('admin.anggota') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>
    </div>
</div>

@endsection
