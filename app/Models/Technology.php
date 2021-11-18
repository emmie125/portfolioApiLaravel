<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    
    protected $table="technologies";

    protected $fillable = ['name','image','id_hard'];

    public function projects()
    {
    return $this->belongsToMany(Project::class, 'foreign_key');
    }
    public function hardSkills() 
    { 
    return $this->belongsTo(HardSkill::class); 
    }
}
