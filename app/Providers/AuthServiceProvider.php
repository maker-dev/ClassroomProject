<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Classroom;
use App\Models\Lesson;
use App\Policies\ClassroomPolicy;
use App\Policies\LessonPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Classroom::class => ClassroomPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
    }
}
