<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstName extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
