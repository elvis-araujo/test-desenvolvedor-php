<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'abbreviation'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
