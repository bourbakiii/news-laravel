<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function registerPage()
    {
        return view('registration');
    }
    public function register(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();

        // Действия после успешного создания пользователя
        return redirect('/login');
    }
    public function loginPage()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            return redirect('/');
        } else {
            // Аутентификация не удалась
            return redirect()->route('login')->withErrors([
                'email' => 'Неверные учетные данные.',
            ])->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}