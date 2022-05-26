<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Returns count users
     *
     * @return Int
     * **/
    public function countUsers()
    {
        return User::count();
    }

    /**
     * Returns list users
     *
     * @return Object
     * **/
    public function users()
    {
        return User::get();
    }

    /**
     * Returns data user
     *
     * @param User $user data user
     * @return Object
     * **/
    public function user(User $user)
    {
        return $user;
    }

    /**
     * Returns role login user
     *
     * @return String
     * **/
    public function yourRole()
    {
        return Auth::user()->role;
    }

    /**
     * Returns view users.show
     *
     * @return Response|ResponseFactory
     * **/
    public function show()
    {
        return view('users.show');
    }

    /**
     * Create a new user
     *
     * @param Request $request request param received
     * **/
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->lastname = $validated['lastname'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->password = $validated['password'];
        $user->save();
    }

    /**
     * Update a user
     *
     * @param Request $request request param received
     * @param User $user data user
     * **/
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $validated['name'];
        $user->lastname = $validated['lastname'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->save();
    }

    /**
     * Delete a user
     *
     * @param User $user data user
     * **/
    public function destroy(User $user)
    {
        $user->delete();
    }

    /**
     * Returns view yourProfile
     *
     * @return Response|ResponseFactory
     * **/
    public function yourProfile()
    {
        return view('yourProfile');
    }

    /**
     * Returns view changeImage
     *
     * @return Response|ResponseFactory
     * **/
    public function changeImage()
    {
        return view('changeImage');
    }

    /**
     * Returns view changePassword
     *
     * @return Response|ResponseFactory
     * **/
    public function changePassword()
    {
        return view('changePassword');
    }

    /**
     * Returns redirect /your-profile
     *
     * @param Request $request request param received
     * @param User $user data user
     * @return Response|ResponseFactory
     * **/
    public function updateProfile(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);

        $user->name = $validated['name'];
        $user->lastname = $validated['lastname'];
        $user->email = $validated['email'];
        $user->save();

        session()->flash('messageUpdateAuth', 'Information updated successfully !!!');

        return redirect('/your-profile');
    }

    /**
     * Returns redirect /change-image
     *
     * @param Request $request request param received
     * @param User $user data user
     * @return Response|ResponseFactory
     * **/
    public function updateChangeImage(Request $request, User $user)
    {
        $user->icon = $request->image;
        $user->save();

        return redirect('/change-image');
    }

    /**
     * Returns redirect /change-password
     *
     * @param Request $request request param received
     * @param User $user data user
     * @return Response|ResponseFactory
     * **/
    public function updateChangePassword(Request $request, User $user)
    {
        $validated = $request->validate([
            'newpassword' => ['required', 'string', 'max:255'],
            'newpasswordverify' => ['required', 'string', 'max:255'],
        ]);

        if ($validated['newpassword'] == $validated['newpasswordverify']) {
            $user->password = Hash::make($validated['newpassword']);
            $user->save();

            session()->flash('messageChangePassword', 'Password updated successfully !!!');
        } else {
            session()->flash('messageChangePasswordError', 'Password could not be verified !!!');
        }

        return redirect('/change-password');
    }
}
