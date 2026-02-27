<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bendahara extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'bendahara';
    protected $fillable = [
        'nama_bendahara',
        'nip',
        'mulai_jabatan',
        'akhir_jabatan',
        'ttd',
    ];
}
