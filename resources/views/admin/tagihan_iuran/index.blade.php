@extends('admin.layouts.admin')
@section('content')
    <section class="content card" style="padding: 10px 10px 20px 20px">
        <div class="box">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="fas fa-file-invoice-dollar"></i>
                        Data Tagihan Iuran
                    </h4>
                     <hr>
                </div>
               
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            {{-- @if(Section::get('success'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{Section::get('success')}}
                                <button class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col">
            <a href="{{route('admin.tagihan_iuran.create')}}" class="btn btn-primary btn-sm my-1 mr-sm-1">
                <i class="fas fa-plus"></i>
                Tambah Data
            </a>
            
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="MyScript">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Nama Anggota</th>
                                <th>Total Nominal</th>
                                <th>Total Cicilan</th>
                                <th>Status</th>
                                <th>Jenis Iuran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tagihan_iuran as $item)
                            <tr>
                                
                                 <td>{{$loop->index+1}}</td>    
                                 <td>{{$item->anggota?->nama_anggota}}</td>     
                                 <td>{{$item->total_nominal}}</td>     
                                 <td>{{$item->total_cicilan}}</td>  
                                 <td class="text-center">
                                    @if($item->status == 'lunas')
                                    <span class ="badge badge-success">Lunas</span>
                                    @else
                                     <span class ="badge badge-danger"> Belum Lunas</span>
                                    @endif
                                </td>    
                                 <td>{{$item->jenis_iuran?->nama_iuran}}</td>    
                                 <td>
                                    <a class="btn btn-warning" href="{{route('admin.tagihan_iuran.edit',$item->id)}}">
                                        Edit
                                    </a>
                                    <form action="{{route('admin.tagihan_iuran.delete',$item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                 </td>
                               
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </table>
            </div>
        </div>
    </section>
@endsection