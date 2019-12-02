<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'music';
    public 	  $timestamps = false;
    protected $fillable = ['author','info','album_title','title','si_proxycompany'];
}
