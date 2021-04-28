<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ujian extends Model
{
    protected $table = 'ujian';
    protected $fillable = ['nama_mk', 'dosen', 'jumlah_soal', 'keterangan'];
    use SoftDeletes;
}
