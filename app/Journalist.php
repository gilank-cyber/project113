<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journalist extends Model
{
    protected $table = 'journalists';
    protected $fillable = ['nama', 'jk', 'no_hp', 'alamat'];
    use SoftDeletes;

    
}

