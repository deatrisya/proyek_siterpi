<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable =[
        'nip',
        'foto',
        'nama',
        'jk',
        'tempat_lahir',
        'tgl_lahir'
    ];
}
