<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentResolver extends Model
{
    use HasFactory;

    protected $fillable = ["filename", "user_id", "assignment_id"];
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher_remark()
    {
        return $this->hasOne(TeacherRemark::class);
    }
}
