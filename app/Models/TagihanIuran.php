<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagihanIuran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tagihan_iuran';
    protected $fillable = [
        'anggota_id',
        'total_nominal',
        'total_cicilan',
        'status',
        'jenis_iuran_id',
    ];
    public function anggota(){
        return $this->belongsTo(anggota::class);
    }
    public function jenis_iuran(){
        return $this->belongsTo(JenisIuran::class);
    }
    public function pembayaran(){
        return $this->hasMany(PembayaranIuran::class);
    }
}
