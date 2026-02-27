<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index(){
        $data_anggota = Anggota::All();
        return view('admin.anggota.index',compact('data_anggota'));
    }
    public function create(){
        return view('admin.anggota.create');
    }
    public function store(Request $request){
        $request->validate([
            'nama_anggota'=>'required|string|max:255',
            'email'=>'required|email',
            'kode_anggota'=>'required|string|max:255|unique:anggota,kode_anggota',
            'jenis_kelamin'=>'required',
            'tgl_join'=>'required|date',
            'foto'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        DB::transaction(function()use($request){ 
            $user = User::Create([
                'name'=>$request->nama_anggota,
                'email'=>$request->email,
                'password'=>Hash::make('password'),
                'role'=>'anggota',
            ]);
            $fotoPath = null;
            if($request->hasFile('foto')){
                $namaFile = Str::slug($request->nama_anggota).'-'.time().'.'.$request->foto->extension();
            }
            $fotoPath = $request->file('foto')->storeAs('foto/anggota',$namaFile,'public');
            Anggota::Create([
                'user_id'=>$user->id,
                'kode_anggota'=>$request->kode_anggota,
                'nama_anggota'=>$request->nama_anggota,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'alamat'=>$request->alamat,
                'no_hp'=>$request->no_hp,
                'tgl_join'=>$request->tgl_join,
                'status'=>'aktif',
                'foto'=>$fotoPath,

            ]);

        });
        return redirect()->route('admin.anggota')->with('success','Data anggota berhasil ditambahkan');
        
    }
    public function edit($id){
        $anggota = Anggota::with('user')->findOrFail($id);
        return view('admin.anggota.edit',compact('anggota'));
    }
    public function update(Request $request,$id){
        $anggota = Anggota::with('user')->findOrFail($id);
        $request->validate([
            'nama_anggota'=>'required|string|max:255',
            'email'=>'required|email',
            'jenis_kelamin'=>'required',
            'alamat'=>'nullable|string',
            'no_hp'=>'nullable|string',
            'status'=>'required|in:aktif,nonaktif',
            'foto'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       $anggota->user->name = $request->nama_anggota;
       $anggota->user->email = $request->email;

       if($request->filled('password')){
        $anggota->user->password = Hash::make($request->password);
       }

       $anggota->user->save();

       if($request->hasFile('foto')){
        if($anggota->foto && Storage::disk('public')->exists($anggota->foto)){
            Storage::disk('public')->delete($anggota->foto);
        }
        $namaFile = Str::slug($request->nama_anggota).'-'.time().'.'.$request->foto->extension();

        $path = $request->file('foto')->storeAs('foto/anggota',$namaFile,'public');
        $anggota->foto = $path;
       }
       $anggota->update([
        'nama_anggota'=>$request->nama_anggota,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'alamat'=>$request->alamat,
        'no_hp'=>$request->no_hp,
        'status'=>$request->status,
       ]);
       return redirect()->route('admin.anggota')->with('success','Data anggota berhasil diupdate');
    }
    public function destroy(Request $request,$id){
        $anggota = Anggota::with('user')->findOrFail($id);
        if($request->hasFile('foto')){
            if($anggota->foto && Storage::disk('public')->exists($anggota->foto)){
                Storage::disk('public')->delete($anggota->foto);
            }
        }
       Anggota::destroy($id);
       return redirect()->route('admin.anggota')->with('success','Data anggota berhasil dihapus');

    }
    

}
