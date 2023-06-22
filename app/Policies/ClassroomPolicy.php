<?php

namespace App\Policies;

use App\Models\Assignment;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClassroomPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Classroom $classroom)
    {
        return $user->classrooms()->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists();
    }


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    public function createLesson(User $user, Classroom $classroom)
    {
        return $user->classrooms()->where('role', 'teacher')->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists();
    }

    public function createAssignment(User $user, Classroom $classroom)
    {
        return $user->classrooms()->where('role', 'teacher')->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists();
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Classroom $classroom)
    {
        return $user->classrooms()->where('role', 'teacher')->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Classroom $classroom)
    {
        return $user->classrooms()->where('role', 'teacher')->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists();
    }

    public function exit(User $user, Classroom $classroom)
    {
        return $user->classrooms()->where("role", "student")->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists();
    }

    public function kick(User $user, Classroom $classroom)
    {
        return $user->classrooms()->where('role', 'teacher')->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists();
    }

    public function uploadAssignment(User $user, Classroom $classroom, Assignment $assignment)
    {

        return $user->classrooms()->where('role', 'student')->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists() && $assignment->deadline >= now() && !$assignment->assignment_resolvers()->exists();
    }
    public function viewAssignmentResolvers(User $user, Classroom $classroom)
    {

        return $user->classrooms()->where('role', 'teacher')->where("classroom_id", $classroom->id)->where("user_id", $user->id)->exists();
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Classroom $classroom)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Classroom $classroom)
    {
        //
    }
}
