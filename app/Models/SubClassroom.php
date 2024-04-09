<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubClassroom extends Model
{
    use HasFactory;
    protected $table = "sub_classrooms";
    protected $fillable = [
        'name',
        'school_level_id',
        'class_room_id',
    ];
    public function school_level()
    {
        return $this->belongsTo(SchoolLevel::class, 'school_level_id');
    }
    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
}
