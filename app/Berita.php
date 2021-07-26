<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = ['berita', 'lokasi', 'kategori', 'jurnalis_id'];
    use SoftDeletes;

    public function Journalist(){
        return $this->belongsTo(Journalist::class, 'jurnalis_id'); 
    }

}
 