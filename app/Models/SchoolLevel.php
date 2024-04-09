<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolLevel extends Model
{
    use HasFactory;
    // protected $table = 'school_levels';
    protected $fillable = [
        'name',
    ];
    public function classrooms()
    {
        return $this->hasMany(ClassRoom::class);
    }
}
