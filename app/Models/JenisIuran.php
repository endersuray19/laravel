<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisIuran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'jenis_iuran';
    protected $fillable = [
        'nama_iuran',
        'tipe',
        'nominal',
        'bisa_dicicil',
        'max_cicilan',
        'status',
    ];
    public function tagihan(){
        return $this->hasMany(TagihanIuran::class);
    }
}
