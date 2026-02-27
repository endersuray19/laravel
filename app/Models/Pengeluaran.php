<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pengeluaran';
    protected $fillable = [
        'nama_pengeluaran',
        'nominal',
        'kategori_id',
        'user_id',
        'lampiran',
    ];
}
