<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteGenre extends Model
{
    use HasFactory;

    public $fillable = ['id_person','id_genre'];

    public $timestamps = false;
}
