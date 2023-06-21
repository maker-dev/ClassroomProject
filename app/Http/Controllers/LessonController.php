<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lesson;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        Gate::authorize("view", $classroom);
        $lessons   = Lesson::where("classroom_id", $classroom->id)->orderBy("created_at", "desc")->paginate(6);
        return view("lesson.index", compact("classroom", "lessons"));
    }

    public function create(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        Gate::authorize("createLesson", $classroom);
        return view("lesson.create", compact("classroom"));
    }

public function store(Request $request, string $id)
{
    $classroom = Classroom::findOrFail($id);
    Gate::authorize("createLesson", $classroom);
    $request->validate([
        'title' => 'bail|required|string|max:20',
        'description' => 'bail|required|string',
        'filename' => 'bail|required|file',
    ]);

    // Storing file
    $file = $request->file("filename");
    $file_extension = $file->getClientOriginalExtension();
    $file_name = $file->hashName().'.'.$file_extension;
    $file->storeAs("public/lessons", $file_name);

    // Storing data
    $classroom->lessons()->create([
        "title" => $request->title,
        "description" => $request->description,
        "filename"    => $file_name
    ]);

    return redirect()->route("lesson.index", ['id' => $classroom->id]);
}

public function download(string $id)
{
    $lesson = Lesson::find($id);
    $filePath = "public/lessons/{$lesson->filename}";
    $filename = $lesson->title . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
    return Storage::download($filePath, $filename);
}
}