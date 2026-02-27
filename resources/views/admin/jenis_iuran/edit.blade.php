@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h5>Edit Jenis Iuran</h5>
        </div>

        <div class="card-body">
             @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <form action="{{ route('admin.jenis_iuran.update', $jenisIuran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Iuran</label>
                    <input type="text" name="nama_iuran"
                           class="form-control"
                           value="{{ $jenisIuran->nama_iuran }}"
                           required>
                </div>

                <div class="form-group">
                    <label>Tipe Iuran</label>
                    <select name="tipe" class="form-control" required>
                        <option value="sekali" {{ $jenisIuran->tipe == 'sekali' ? 'selected' : '' }}>Sekali</option>
                        <option value="bulanan" {{ $jenisIuran->tipe == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                        <option value="tahunan" {{ $jenisIuran->tipe == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nominal</label>
                    <input type="number" name="nominal"
                           class="form-control"
                           value="{{ $jenisIuran->nominal }}"
                           required>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="bisa_dicicil" id="bisa_dicil"
                            {{ $jenisIuran->bisa_dicicil ? 'checked' : '' }} value="1">
                        Bisa Dicicil
                    </label>
                </div>

                <div class="form-group" id="cicilanField"
                     style="{{ $jenisIuran->bisa_dicicil ? '' : 'display:none;' }}">
                    <label>Maksimal Cicilan</label>
                    <input type="number" name="max_cicilan"
                           class="form-control"
                           value="{{ $jenisIuran->max_cicilan }}">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="aktif" {{ $jenisIuran->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $jenisIuran->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.jenis_iuran.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>

<script>
document.getElementById('bisa_dicil').addEventListener('change', function () {
    document.getElementById('cicilanField').style.display =
        this.checked ? 'block' : 'none';
});
</script>
@endsection
