@extends('admin.layouts.admin')
@section('content')
<div class="box card content" style="padding: 40x 30x 10px 10px">
    <div class="row">
        <div class="col">
            <h3>Update Data Tagihan Iuran</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{route('admin.tagihan_iuran.update',$tagihan_iuran->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_anggota">Nama Anggota</label>
                    <select name="anggota_id" id="anggota_id" class="form-control select2">
                        <option >--Pilih Anggota--</option>
                            @foreach($anggota as $ang)
                                <option value="{{$ang->kode_anggota}}" {{$ang->kode_anggota == $tagihan_iuran->anggota_id ? 'selected' : ''}}>{{$ang->nama_anggota}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="total_nominal">Total Nominal</label>
                    <input type="text" name="total_nominal" class="form-control" value="{{$tagihan_iuran->total_nominal}}">
                </div>
                <div class="form-group">
                    <label for="total_cicilan">Total Cicilan</label>
                    <input type="text" name="total_cicilan" class="form-control" value="{{$tagihan_iuran->total_cicilan}}">
                </div>
                <div class="form-group">
                    <label for="jenis_iuran_id">Jenis Iuran</label>
                    <select name="jenis_iuran_id" id="jenis_iuran_id" class="form-control">
                        @foreach($jenis_iuran as $jn)
                        <option value="{{$jn->id}}" {{$jn->id == $tagihan_iuran->jenis_iuran_id ? 'selected':''}}>{{$jn->nama_iuran}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="lunas" {{$tagihan_iuran->status == 'lunas' ? 'selected': ''}}>Lunas</option>
                        <option value="belum_lunas" {{$tagihan_iuran->status == 'belum_lunas' ? 'selected': ''}}>Belum Lunas</option>
                    </select>
                </div>
                <div class="form-group">
                    <a class="btn btn-secondary" href="{{route('admin.tagihan_iuran.index')}}">Kembali</a>
                    <button class="btn btn-warning" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection