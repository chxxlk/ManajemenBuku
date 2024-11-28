<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $table = 'genre';
    protected $primaryKey = 'id_genre';

    protected $fillable = [
        'id_genre',
        'nama_genre',
    ];
}
