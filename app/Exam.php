<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    protected $table = 'exams';
    protected $primarykey = 'id';
    protected $fillable = ['judul_13', 'abstrak_13'];
    use SoftDeletes;
}
