<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['productId', 'userId', 'kuantitas', 'alamat', 'kodePos', 'total'];
}
