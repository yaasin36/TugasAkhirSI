<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanB extends Model
{
    use HasFactory;
    protected $table = "tbl_tagihanBulanan";
    protected $primaryKey = 'id_tB';
    protected $fillable = [
        'id_user',
        'nama_tagihan',
        'awal_tagihan',
        'akhir_tagihan',
        'jumlah',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
