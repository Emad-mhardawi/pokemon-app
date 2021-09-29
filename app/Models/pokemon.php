<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    
use HasFactory;
protected $table = 'pokemon';
protected $primaryKey = 'id';
protected $fillable = [
    'name', 'imageUrl', 'base_experience',
    'height', 'weight','type','hp','attack',
    'defense','special_attack','special_defense','speed'
];

}
