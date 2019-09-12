<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    protected $fillable = [
        'kabupaten_kota','kecamatan',
        'nama','bentuk',
        'alamat','lintang','bujur',
        'jumlah','active','kategori'
    ];
}
