@extends('admin.layouts.admin')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css">

    <div class="box card content" style="pading:10px 10px 20px 20x" >
        <div class="row">
            <div class="col">
                <h4>Tambah Data Tagihan Iuran</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{-- @if(Section::get("error"))
                <div class="alert alert-danger" role="alert">
                    {{Section::get("error")}}
                </div>
                @endif --}}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="{{route('admin.tagihan_iuran.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Anggota</label>
                        <select name="anggota_id" id="anggota_id" class="form-control select2">
                            <option value="">--cari anggota--</option>
                            @foreach ($anggota as $item)
                                <option value="{{$item->kode_anggota}}">{{$item->kode_anggota}} - {{$item->nama_anggota}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                    <label for="">Jenis Iuran</label>
                    <select name="jenis_iuran_id" id="jenis_iuran_id" class="form-control">
                        <option value="">--Pilih Jenis Iuran--</option>
                        @foreach($jenis_iuran as $ji)
                          <option value="{{$ji->id}}" data-harga="{{$ji->nominal}}" data-cicil="{{$ji->max_cicilan}}">{{$ji->nama_iuran}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="total_nominal">Total Nominal</label>
                        <input type="number" name="total_nominal" id="total_nominal" class="form-control" required readonly>
                        </div>
                    <div class="form-group">
                         <label for="total_cicilan">Total Cicilan</label>
                        <input type="number" name="total_cicilan" id="total_cicilan" class="form-control" required readonly>
                        </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option default>-- Pilih Status --</option>
                            <option value="lunas">Lunas</option>
                            <option value="belum_lunas">Belum Lunas</option>
                        </select>
                        </div>
                       
                    <div class="form-group">
                        <a href="{{route('admin.tagihan_iuran.index')}}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <div class="form-group">
                    <input type="text" class="form-control" id="klikone">
                    <button class="btn btn-primary" onclick="push()">Klik</button>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="pinjaman">
                    <select name="" id="simpanan">
                        <option value="wajib" data-value="10000">Simpanan wajib</option>
                        <option value="pokok" data-value="50000">Simpanan pokok</option>
                    </select>

                </div>
            </div>
        </div>
    </div>

    

@push('myscript')
<script>
        document.getElementById("simpanan").addEventListener('change',function(){
            let option = this.options[this.selectedIndex];
            let simpanan = option.getAttribute("data-value");
            document.getElementById("pinjaman").value = simpanan;
            
        });
        function push(){
             let angka = document.getElementById("klikone");
            angka.value = 10000;
        }
        $(document).ready(function(){
              $("#jenis_iuran_id").on('change',function(){

                const harga = $(this).find(':selected').data('harga');
                const cicilan =  $(this).find(':selected').data('cicil');
            

                $('#total_nominal').val(harga);

                $('#total_cicilan').val(cicilan);

            });
            
        });
        $(document).ready(function(){
                $('#anggota_id').select2({
                    theme:'bootstrap4',
                    placeholder:"--cari anggota--",
                    allowClear:true
                });
            });
        
    </script>
    @endpush
@endsection