<?php

namespace App\Http\Controllers\Amin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login.index');
    }

    public function checkLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.post.index');
        }
        return redirect('/')->with('error', 'Failed');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.auth.login');
    }

    public function profile()
    {
        return view('admin.login.profile');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $user = Auth::user();

        $data = [
            'name' => $request->name,
        ];

        if ($request->password) {
            $this->validate($request, [
                'password' => 'required|min:6|max:32',
                'confirm' => 'same:password',
            ]);
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.profile.index')->with('success', 'Updated successfully');
    }
}
