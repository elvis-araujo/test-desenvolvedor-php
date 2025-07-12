<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'state_id'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function representatives()
    {
        return $this->hasMany(Representative::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
