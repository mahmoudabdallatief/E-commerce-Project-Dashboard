<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Priv extends Model
{
    protected $table = 'priv';
    protected $primaryKey = 'id_priv';
    protected $fillable = ['name','priv'];
}
