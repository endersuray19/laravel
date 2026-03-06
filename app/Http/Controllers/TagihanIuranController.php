<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagihanIuran;
use App\Models\Anggota;
use App\Models\JenisIuran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TagihanIuranController extends Controller
{
    public function index(){
        $tagihan_iuran = TagihanIuran::with(['anggota','jenis_iuran'])->get();
        return view('admin.tagihan_iuran.index',compact('tagihan_iuran'));
    }
    public function create(){
        $anggota = Anggota::all();
        $jenis_iuran = JenisIuran::all();
        return view('admin.tagihan_iuran.create',compact('anggota','jenis_iuran'));
    }
    public function store(Request $request){
        $request->validate([
            "anggota_id"=>"required",
            "total_nominal"=>"required|numeric",
            "total_cicilan"=>"required",
            "status"=>"required",
            "jenis_iuran_id"=>"required"

        ]);
        TagihanIuran::Create([
            "anggota_id"=>$request->anggota_id,
            "total_nominal"=>$request->total_nominal,
            "total_cicilan"=>$request->total_cicilan,
            "status"=>$request->status,
            "jenis_iuran_id"=>$request->jenis_iuran_id
        ]);

        return redirect()->route('admin.tagihan_iuran.index');
    }
    public function edit($id){
        $tagihan_iuran = TagihanIuran::findOrFail($id);
        $anggota = Anggota::All();
        $jenis_iuran = JenisIuran::All();
        return view('admin.tagihan_iuran.edit',compact('tagihan_iuran','anggota','jenis_iuran'));
    }
    public function destroy(Request $request, $id){
        $tagihan_iuran = TagihanIuran::findOrFail($id);
        $tagihan_iuran->delete();

        return redirect()->route('admin.tagihan_iuran.index');
    }
}
