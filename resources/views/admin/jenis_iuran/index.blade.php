@extends('admin.layouts.admin')

@section('content')

<section class="content card" style="padding: 10px 10px 20px 20px">
    <div class="box">
        <div class="row">
            <div class="col">
                <h4>
                    <i class="fas fa-users nav-icon"></i>
                    Data Jenis Iuran
                </h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
               <div class="row">
                    <div class="col-12">
                        @if (Session::get('success'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::get('warning'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ Session::get('warning') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="col">
                <a href="{{ route('admin.jenis_iuran.create') }}" class="btn btn-primary btn-sm my-1 mr-sm-1">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="MyScript">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Iuran</th>
                                <th>Tipe</th>
                                <th>Nominal</th>
                                <th>Cicilan</th>
                                <th>Status</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                <tbody>
                    @forelse ($jenisIuran as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_iuran }}</td>
                        <td class="text-center">{{ ucfirst($item->tipe) }}</td>
                        <td class="text-right">Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        <td class="text-center">
                            @if ($item->bisa_dicicil)
                                <span class="badge badge-success">
                                    Bisa ({{ $item->max_cicilan }}x)
                                </span>
                            @else
                                <span class="badge badge-secondary">Tidak</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge badge-{{ $item->status == 'aktif' ? 'success' : 'danger' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.jenis_iuran.edit', $item->id) }}"
                            class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.jenis_iuran.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data belum tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
