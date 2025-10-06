<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'email',
        'date_naissance',
        'telephone',
        'city_id'
    ];

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
