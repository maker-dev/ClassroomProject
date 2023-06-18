<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function home()
    {
        $classrooms = Classroom::myClassrooms(auth()->id());
        return view("classroom.home", compact("classrooms"));
    }
    public function create()
    {
        return view("classroom.create");
    }

    public function join(Request $request)
    {
        $request->validate([
            "secret_code" => "required|exists:secret_codes,code"
        ]);
        return $request;
    }
}
