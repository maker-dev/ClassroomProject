<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        Gate::authorize("view", $classroom);
        return view("lesson.show", compact("classroom"));
    }

}
