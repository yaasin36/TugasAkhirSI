<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumber extends Model
{
    use HasFactory;
    protected $table = 'tbl_sumbers';
    protected $primaryKey = 'id_sumber';
    protected $fillable = [
        'nama_sumber',
        'tipe_sumber',
    ];
}
