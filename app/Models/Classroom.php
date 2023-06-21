<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = ["name", "subject", "description", "cover_image", "background_image"];

    public function secret_code()
    {
        return $this->hasOne(SecretCode::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot("role");
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
    public function scopeTeacherName($query)
    {
        return $query->join('classroom_user', 'classrooms.id', '=', 'classroom_user.classroom_id')
            ->where('classroom_user.role', "teacher")->join("users", "classroom_user.user_id", "=", "users.id")->get()[0]->name;
    }
}
