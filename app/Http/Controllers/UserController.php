<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function countUsers()
    {
        return User::count();
    }

    public function users()
    {
        return User::get();
    }

    public function user(User $user)
    {
        return $user;
    }

    public function yourRole()
    {
        return Auth::user()->role;
    }

    public function show()
    {
        return view('users.show');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;
        $user->save();
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

    public function yourProfile()
    {
        return view('yourProfile');
    }

    public function changeImage()
    {
        return view('changeImage');
    }

    public function changePassword()
    {
        return view('changePassword');
    }

    public function updateProfile(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();

        session()->flash('messageUpdateAuth', 'Information updated successfully !!!');

        return redirect('/your-profile');
    }

    public function updateChangeImage(Request $request, User $user)
    {
        $user->icon = $request->image;
        $user->save();

        return redirect('/change-image');
    }

    public function updateChangePassword(Request $request, User $user)
    {
        $request->validate([
            'newpassword' => ['required', 'string', 'max:255'],
            'newpasswordverify' => ['required', 'string', 'max:255'],
        ]);

        if ($request->newpassword == $request->newpasswordverify) {
            $user->password = Hash::make($request->newpassword);
            $user->save();

            session()->flash('messageChangePassword', 'Password updated successfully !!!');
        } else {
            session()->flash('messageChangePasswordError', 'Password could not be verified !!!');
        }

        return redirect('/change-password');
    }
}
