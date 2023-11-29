<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = ['username', 'password', 'pri'];

    public function priv()
    {
        return $this->belongsTo(Priv::class, 'pri');
    }

}
