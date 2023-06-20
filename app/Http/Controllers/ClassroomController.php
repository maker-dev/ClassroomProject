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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string|max:20',
            'description' => 'bail|required|string',
            'subject' => 'bail|required|string|max:20',
            'cover_image' => 'bail|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        //current user
        $user = User::find(auth()->id());
        //storing file
        if ($request->exists("cover_image")) {
            //storing image
            $image = $request->file("cover_image");
            $image_name = $image->hashName();
            $image->storeAs("/public/cover_images", $image_name);
            //storing data
            $classroom = Classroom::create([
                "name" => $request->name,
                "description" => $request->description,
                "subject" => $request->subject,
                "cover_image" => $image_name
            ]);
        } else {
            //storing data
            $classroom = Classroom::create($request->all());
        }
        //attaching user to classroom

        $user->classrooms()->attach($classroom, ["role" => "teacher"]);
        //attaching classroom to a secret code

        $uniqueCodeGenerated = false;
        $secretCode = '';

        while (!$uniqueCodeGenerated) {
            $secretCode = fake()->regexify('[A-Z0-9]{10}'); // Generate an 10-character alphanumeric code

            // Check if the secret code already exists in the classrooms table
            $existingCode = SecretCode::where('code', $secretCode)->exists();

            if (!$existingCode) {
                $uniqueCodeGenerated = true;
            }
        }

        $classroom->secret_code()->create([
            "code" => $secretCode
        ]);

        return redirect()->route("home");
    }

    public function join(Request $request)
    {
        $request->validate([
            "secret_code" => "required|exists:secret_codes,code"
        ]);
        $secret_code = SecretCode::where("code", $request->secret_code)->get()[0];
        $classroom   = $secret_code->classroom;
        //validate if user is already in this classroom
        foreach ($classroom->users as $user) {
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
