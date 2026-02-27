<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranIuran extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pembayaran_iuran';
    protected $fillable = [
        'tagihan_iuran_id',
        'order_id',
        'ciciklan_ke',
        'nominal_bayar',
        'payment_method',
        'status',
    ];
    public function tagihan(){
        return $this->belongsTo(TagihanIuran::class);
    }
    
}
