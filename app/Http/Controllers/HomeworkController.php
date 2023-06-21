<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Assignment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeworkController extends Controller
{
    public function index(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        Gate::authorize("view", $classroom);
        $assignments   = Assignment::where("classroom_id", $classroom->id)->orderBy("created_at", "desc")->paginate(6);
        return view("homework.index", compact("classroom", "assignments"));
    }

    public function create(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        Gate::authorize("createAssignment", $classroom);
        return view("homework.create", compact("classroom"));
    }

    public function store(Request $request, string $id)
    {
        $classroom = Classroom::findOrFail($id);
        Gate::authorize("createAssignment", $classroom);
        $datenow = now();
        $request->validate([
            'title' => 'bail|required|string|max:20',
            'description' => 'bail|required|string',
            'filename' => 'bail|required|file',
            'deadline' => "bail|required|date|after:$datenow",
        ]);

        // Storing file
        $file = $request->file("filename");
        $file_extension = $file->getClientOriginalExtension();
        $file_name = $file->hashName() . '.' . $file_extension;
        $file->storeAs("public/assignments", $file_name);

        // Storing data
        $classroom->assignments()->create([
            "title" => $request->title,
            "description" => $request->description,
            "filename"    => $file_name,
            "deadline" => $request->deadline
        ]);

        return redirect()->route("homework.index", ['id' => $classroom->id]);
    }

    public function show(string $classroom_id, string $assignment_id)
    {
        $classroom  = Classroom::findOrFail($classroom_id);
        $assignment = Assignment::findOrFail($assignment_id);
        Gate::authorize("uploadAssignment", [$classroom, $assignment]);

        return view("homework.show", compact("classroom", "assignment"));
    }

    public function submitwork(Request $request, string $classroom_id, string $assignment_id)
    {

        $classroom  = Classroom::findOrFail($classroom_id);
        $assignment = Assignment::findOrFail($assignment_id);
        Gate::authorize("uploadAssignment", [$classroom, $assignment]);

        $request->validate([
            "filename" => "bail|required|file"
        ]);

        // Storing file
        $file = $request->file("filename");
        $file_extension = $file->getClientOriginalExtension();
        $file_name = $file->hashName() . '.' . $file_extension;
        $file->storeAs("public/assignment_resolvers", $file_name);

        // Storing data
        $assignment->assignment_resolvers()->create([
            "user_id" => auth()->id(),
            "filename" => $file_name
        ]);

        return redirect()->route("homework.index", ['id' => $classroom->id]);
    }

    public function download(string $id)
    {
        $assignment = Assignment::find($id);
        $filePath = "public/assignments/{$assignment->filename}";
        $filename = $assignment->title . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
        return Storage::download($filePath, $filename);
    }
}
