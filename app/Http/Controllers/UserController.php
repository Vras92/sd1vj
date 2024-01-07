<?php

namespace App\Http\Controllers;

use App\Utils\UserDatabase;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function modifyUser($id)
    {
        $user = UserDatabase::getUserById($id);

        if ($user) {
            return view('modifyUser', ['user' => $user]);
        } else {
            abort(404);
        }
    }

    public function updateUser(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        UserDatabase::updateUser($id, $validatedData);

        return redirect()->route('adminUser')->with('success', __('messages.userUpdated'));
    }

}
