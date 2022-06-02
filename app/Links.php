<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table = 'links';
    public $primarykey = 'id';
    public $timestamp = true;

    protected $fillable = ['original_link', 'short_link'];
}
