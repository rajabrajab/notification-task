<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
      public function createAdmin()
    {
        if (User::where('email', 'admin@acc.com')->exists()) {
            return "Admin user already exists.";
        }

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@acc.com',
            'password' => Hash::make('1@345678'),
        ]);

        Auth::login($admin);

        return redirect('/home')->with('status', 'Logged in as an admin.');
    }

    /**
     * Directly log in an admin by user ID.
     */
    public function directAdminLogin($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return abort(404, 'User not found.');
        }

        if ($user->id === 1) {
            Auth::login($user);
            return redirect('/home')->with('status', 'Logged in as an admin.');
        }

        return abort(403, 'Unauthorized access.');
    }
}
