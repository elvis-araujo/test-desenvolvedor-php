<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Representative extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id'];

    /**
     * Representante pertence a uma cidade.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Acesso ao estado via cidade.
     * Permite usar: $representative->state
     */
    public function state()
    {
        return $this->city?->state();
    }
}
