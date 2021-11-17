<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardSkillModel extends Model
{
    use HasFactory;
    protected $table="hard_skills"; 

    protected $fillable = ['title','image'];

    public function technologies() 
    { 
    return $this->hasMany(Technology::class); 
    }
}
