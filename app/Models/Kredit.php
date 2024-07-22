<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    use HasFactory;
    protected $table = "tbl_kredits";
    protected $primaryKey = 'id_kredit';
    protected $fillable = [
        'id_user',
        'nama_kredit',
        'awal_kredit',
        'tenor',
        'akhir_kredit',
        'jumlah',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
