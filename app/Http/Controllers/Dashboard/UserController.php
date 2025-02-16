<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if ($user->role_user_id === 1) {
            return redirect()->back()->with('error-delete-pengguna', 'User Admin Tidak Dapat Dihapus');   
        } else {
            if ($user->diagnoseHistory()->exists()) {
                $user->diagnoseHistory()->delete();
            }
            $user->delete();
            return redirect()->back()->with('success-delete-pengguna', 'User berhasil dihapus');
        }
    }
}
