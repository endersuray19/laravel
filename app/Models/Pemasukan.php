<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pemasukan';
    protected $fillable = [
        'sumber',
        'nominal',
        'tanggal',
        'user_id',
        'ref_id',
    ];
}
