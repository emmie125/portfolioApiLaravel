<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyModel extends Model
{
    use HasFactory;
    
    protected $table="technologies";

    protected $fillable = ['name','image','id_hard'];

    public function projects()
    {
    return $this->belongsToMany(Project::class, 'foreign_key')->withTimestamps();;
    }
    public function hard_skills() 
    { 
    return $this->belongsTo(HardSkill::class); 
    }
}
