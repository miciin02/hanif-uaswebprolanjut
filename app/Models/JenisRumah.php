<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisRumah extends Model
{
    use HasFactory;

    protected $table = 'jenis_rumah';
    protected $fillable = ['jenis'];
}
