<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftSkillModel extends Model
{
    use HasFactory;
    protected $table="soft_skills";

    protected $fillable = ['title'];

}
