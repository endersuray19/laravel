@extends('admin.layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h5>Tambah Jenis Iuran</h5>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('admin.jenis_iuran.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Iuran</label>
                    <input type="text" name="nama_iuran" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tipe Iuran</label>
                    <select name="tipe" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="sekali">Sekali</option>
                        <option value="bulanan">Bulanan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nominal</label>
                    <input type="number" name="nominal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" value="1" name="bisa_dicil" id="bisa_dicil">
                        Bisa Dicicil
                    </label>
                </div>

                <div class="form-group" id="cicilanField" style="display:none;">
                    <label>Maksimal Cicilan</label>
                    <input type="number" name="max_cicilan" class="form-control">
                </div>
                <div class="form-grup">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option>-- Pilih Status --</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.jenis_iuran.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
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
