<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ["name", "subject", "description", "cover_image"];

    public function secret_code()
    {
        return $this->hasOne(SecretCode::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function scopeMyClassrooms($query, $userId)
    {
        return $query->join('classroom_user', 'classrooms.id', '=', 'classroom_user.classroom_id')
            ->where('classroom_user.user_id', $userId)->paginate(6);
    }

    public function scopeIsTeacher($query, $userId)
    {
        return $query->join('classroom_user', 'classrooms.id', '=', 'classroom_user.classroom_id')
            ->where('classroom_user.user_id', $userId)->where("classroom_user.role", "teacher")->exists();
    }
    public function teacher()
    {
        return $this->belongsToMany(User::class, 'classroom_user')
            ->wherePivot('role', 'teacher');
    }
}
