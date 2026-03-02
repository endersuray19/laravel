<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagihanIuran;
use App\Models\Anggota;
use App\Models\JenisIuran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TagihanIuranController extends Controller
{
    public function index(){
        $tagihan_iuran = TagihanIuran::with(['anggota','jenis_iuran'])->get();
        return view('admin.tagihan_iuran.index',compact('tagihan_iuran'));
    }
}
