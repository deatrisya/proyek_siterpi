<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedhistory extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'pakan_id',
        'tanggal',
        'masuk',
        'keluar'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function feedHistory()
    {
        return $this->hasMany(Feedhistory::class,'feed_id');
    }

}
