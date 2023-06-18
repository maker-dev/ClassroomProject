<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\SecretCode;
use App\Models\User;
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
        $secret_code = SecretCode::where("code", $request->secret_code)->get()[0];
        $classroom   = $secret_code->classroom;
        //validate if user is already in this classroom
        foreach ($secret_code->classroom->users as $user) {
            if ($user->id == auth()->id()) {
                return redirect()->route("home");
            }
        }
        //attach user to classroom
        $currUser = User::find(auth()->id());
        $currUser->classrooms()->attach($classroom, ["role" => "student"]);

        return redirect()->route("home");
    }
}
