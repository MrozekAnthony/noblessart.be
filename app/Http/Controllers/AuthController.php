<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeToNoblessartMail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Str;
use App\Mail\ContactMail;



class AuthController extends Controller
{
    public function login()
    {
        return view('connect');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard.index'));
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Les identifiants ne correspondent pas',
        ])->onlyInput('email', 'password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('auth.login');
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);

        $user = User::create([
            'role_id' => 4,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        Mail::to($user->email)->send(new WelcomeToNoblessartMail());

        return redirect()->route('dashboard.index');
    }

    public function forgotPassword()
    {
        return view('forgot-password');
    }

    public function doForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->input('email'))->firstOrFail();
        if($user) {
            $plainPassword = Str::random(10);
            $user->password = Hash::make($plainPassword);
            $user->save();
            Mail::to($user->email)->send(new ResetPasswordMail($plainPassword));
            return redirect()->route('auth.login');
        } else {
            return redirect()->route('auth.forgotPassword')->withErrors([
                'email' => 'L\'adresse email ne correspond à aucun compte',
            ])->onlyInput('email');
        }

    }

    public function doContact(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'content' => 'required|string',
        ]);
        //$data = $request->request->all();

        //dd($data);
        $mail = "info@noblessart.be";
        Mail::to($mail)
            ->cc($data['email'])
            ->send(new ContactMail($data));

        return view('contact')->with('message', 'Votre message a bien été envoyé');
    }
}
