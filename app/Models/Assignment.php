<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = ["title", "description", "filename", "deadline"];
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function assignment_resolvers()
    {
        return $this->hasMany(AssignmentResolver::class);
    }

    public function scopeAssignmentResolved($query, $assignment_id)
    {
        return $this->join("assignment_resolvers", "assignments.id", "=", "assignment_resolvers.assignment_id")->where("assignments.id", $assignment_id)->exists();
    }
}
