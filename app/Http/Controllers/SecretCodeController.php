<?php

namespace App\Http\Controllers;

use App\Models\SecretCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SecretCodeController extends Controller
{
    public function regenerateCode(string $id)
    {
        $secretCode = SecretCode::find($id);
        Gate::authorize("update", $secretCode->classroom);
        $uniqueCodeGenerated = false;
        $newSecretCode = '';

        while (!$uniqueCodeGenerated) {
            $newSecretCode = fake()->regexify('[A-Z0-9]{10}'); // Generate an 10-character alphanumeric code

            // Check if the secret code already exists in the classrooms table
            $existingCode = SecretCode::where('code', $newSecretCode)->exists();

            if (!$existingCode) {
                $uniqueCodeGenerated = true;
            }
        }

        $secretCode->update([
            'code' => $newSecretCode
        ]);

        return redirect()->route("classroom.show", ['id' => $secretCode->classroom->id]);
    }
}
