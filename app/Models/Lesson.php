<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "filename"];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
