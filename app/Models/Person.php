<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function firstName() {
        return $this->belongsTo(FirstName::class);
    }

    public function lastName() {
        return $this->belongsTo(LastName::class);
    }

    public function music() {
        return $this->belongsTo(Music::class);
    }
}
