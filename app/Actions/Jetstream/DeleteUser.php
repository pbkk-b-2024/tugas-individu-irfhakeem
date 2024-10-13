<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;
use Illuminate\Foundation\Auth\User;
use App\Models\Patient;
use App\Models\Doctor;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     */
    public function delete(User $user): void
    {
        $email = $user->email;
        if ($user->hasRole("patient")) {
            Patient::where('email', $email)->delete();
        } elseif ($user->hasRole("doctor")) {
            Doctor::where('email', $email)->delete();
        }

        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
