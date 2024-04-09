<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'school_level_id'
    ];
    public function school_level()
    {
        return $this->belongsTo(SchoolLevel::class, 'school_level_id');
    }
    public function subclassrooms()
    {
        return $this->hasMany(SubClassroom::class);
    }
}
