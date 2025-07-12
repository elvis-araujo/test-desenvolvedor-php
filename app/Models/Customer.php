<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'document', 'birth_date', 'address', 'city_id', 'sex'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function state()
    {
        return $this->city->state();
    }
}
