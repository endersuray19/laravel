<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class anggota extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'anggota';
    protected $fillable = [
        'user_id',
        'nama_anggota',
        'kode_anggota',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'tgl_join',
        'status',
        'foto',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tagihan(){
        return $this->hasMany(TagihanIuran::class, 'anggota_id');
    }
}
