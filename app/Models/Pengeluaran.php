<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'tbl_pengeluarans';
    protected $primaryKey = 'id_pengeluaran';
    protected $fillable = [
        'id_user',
        'id_sumber',
        'tgl_pengeluaran',
        'jumlah',
    ] ;


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function sumber()
    {
        return $this->belongsTo('App\Models\Sumber', 'id_sumber');
    }
}
