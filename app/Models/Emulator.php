<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emulator extends Model
{
    use HasFactory;

    public $fillable = ['person','id_favorite_genre','hours'];

    public $timestamps = false;
}
