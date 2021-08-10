<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vsl extends Model
{
    protected $fillable = ['id','title','image','url','hits','leads','members'];
    public $timestamps = false;
}
