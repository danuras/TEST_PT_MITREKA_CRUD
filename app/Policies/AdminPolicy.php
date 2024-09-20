<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class AdminPolicy
{
    /**
     * Mengecek user terotentikasi memiliki akses untuk melakukan aksi
     */
    public function admin(User $user)
    {
        Log::debug('role = ' . $user->role);
        return 'admin' == $user->role;
    }

}
