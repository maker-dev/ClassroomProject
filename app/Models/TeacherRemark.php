<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherRemark extends Model
{
    use HasFactory;

    public function assignment_resolver()
    {
        return $this->belongsTo(AssignmentResolver::class);
    }
}
