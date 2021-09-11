<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('web.auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/');
        }
        return redirect()->route('admin.auth.login')->with('error', 'Failed');
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }

    public function forgotPassword()
    {
        return view('web.auth.forgot-password');
    }

    public function sendMail(Request $request)
    {
        if ($user = User::where('email', $request->email)->first()) {
            $mail = new ForgotPassword($user->email);
            Mail::to($user->email)->send($mail);
            return redirect()->back()->with('success', 'Check your email!');
        }

        return redirect()->back()->with('error', 'Email not found!');
    }

    public function formReset(Request $request)
    {
        $email = Crypt::decryptString($request->token);
        if (!User::where('email', $email)->first()) {
            return view('web.auth.reset-password')->with('error', 'Error');
        }
        return view('web.auth.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|max:32',
            'confirm' => 'same:password',
        ]);
        $email = Crypt::decryptString($request->token);
        if (!User::where('email', $email)->first()) {
            return redirect()->route('form-reset')->with('error', 'Error');
        }
        User::where('email', $email)
            ->update([
                'password' => bcrypt($request->password)
            ]);
        return redirect('/login')->with('success', 'Reset password successfully');
    }
}
