<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisIuran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JenisIuranController extends Controller
{
    public function index(){
        $jenisIuran = JenisIuran::All();
        return view('admin.jenis_iuran.index',compact('jenisIuran'));
    }
    public function create(){
        return view('admin.jenis_iuran.create');
    }
    public function store(request $request){
        $request->validate([
            'nama_iuran'=>'required',
            'tipe'=>'required',
            'nominal'=>'required',
            'bisa_dicicil'=>'nullable',
            'max_cicilan'=>'nullable',
            'status'=>'required',
        ]);
        JenisIuran::create([
            'nama_iuran'=>$request->nama_iuran,
            'tipe'=>$request->tipe,
            'nominal'=>$request->nominal,
            'bisa_dicicil'=>$request->bisa_dicicil,
            'max_cicilan'=>$request->max_cicilan,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.jenis_iuran.index')->with('success','Data berhasil ditambahkan');
    }
    public function edit($id){
        $jenisIuran = JenisIuran::findOrFail($id);
        return view('admin.jenis_iuran.edit',compact('jenisIuran'));
    }
    public function update(Request $request, $id){
        $jenisIuran = JenisIuran::findOrFail($id);
        $request->validate([
            'nama_iuran'=>'required',
            'tipe'=>'required',
            'nominal'=>'required',
            'bisa_dicicil'=>'nullable',
            'max_cicilan'=>'nullable|numeric',
            'status'=>'required',
        ]);
        $jenisIuran->update([
            'nama_iuran'=>$request->nama_iuran,
            'tipe'=>$request->tipe,
            'nominal'=>$request->nominal,
            'bisa_dicicil'=>$request->bisa_dicicil,
            'max_cicilan'=>$request->max_cicilan,
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.jenis_iuran.index')->with('success','Data berhasil diupdate');
    }
    public function destroy($id){
        $jenisIuran = JenisIuran::findOrFail($id);
        $jenisIuran->delete();
        return redirect()->route('admin.jenis_iuran.index')->with('success','Data berhasil dihapus');
    }
}
