<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'department_id'

    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subject');
    }
}
