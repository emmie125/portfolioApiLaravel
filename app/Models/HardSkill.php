<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardSkill extends Model
{
    use HasFactory;
    protected $table="hard_skills"; 

    protected $fillable = ['title'];

    public function technologies() 
    { 
    return $this->hasMany(Technology::class); 
    }
}
