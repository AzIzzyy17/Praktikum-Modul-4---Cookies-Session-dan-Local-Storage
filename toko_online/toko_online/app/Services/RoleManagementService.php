<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Validation\ValidationException;

class RoleManagementService
{
    public function changeRole(User $actor, User $target, string $newRole): void
    {
        // Aturan: Admin tidak boleh mengubah role diri sendiri atau akun admin lain
        if ($actor->is($target) || $target->role === 'admin') {
            throw ValidationException::withMessages([
                'role' => 'Akun admin tidak dapat diubah di fitur ini.'
            ]);
        }

        // Aturan: Jika role target sudah sama, abaikan (no-op)
        if ($target->role === $newRole) {
            return;
        }

        $target->role = $newRole;
        $target->save();
    }
}