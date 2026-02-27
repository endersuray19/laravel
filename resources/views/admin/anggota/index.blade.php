@extends('admin.layouts.admin')
@section('content')
<section class="content card" style="padding: 10px 10px 20px 20px">
    <div class="box">
        <div class="row">
            <div class="col">
                <h4>
                    <i class="fas fa-users nav-icon"></i>
                    Data Anggota
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
                <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary btn-sm my-1 mr-sm-1">
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
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-left">Foto</th>
                                <th class="text-left">Kode Anggota</th>
                                <th class="text-left">Nama Anggota</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_anggota as $anggota)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    @if($anggota->foto)
                                        <img src="{{  asset('storage/'.$anggota->foto) }}"
                                            width="50" class="rounded">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $anggota->kode_anggota }}</td>
                                <td>{{ $anggota->nama_anggota }}</td>
                                <td>
                                    {{-- <a href="{{ route('anggota.show', $anggota->id) }}" class="btn btn-info btn-sm">
                                        Detail
                                    </a> --}}
                                    <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('anggota.destroy', $anggota->id) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin hapus data ini?')"
                                            class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td> 
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Data anggota belum tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    

    </div>
</section>

@push('myscript')
<script>
    $(function(){
        $('#MyScript').DataTable();
    })

    document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-confirm');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const form = document.getElementById(`delete-form-${id}`);

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika dikonfirmasi
                    form.submit();

                    // Tampilkan pesan sukses
                    Swal.fire({
                        title: "Hapus",
                        text: "Data Berhasil Dihapus",
                        icon: "success"
                    });
                }
            });
        });
    });
});

</script>
@endpush
@endsection
