<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }
    public function registerView()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            "email" => 'required|email',
            "password" => 'required|string|min:8',
            "first_name" => 'required|string',
            "last_name" => 'required|string',
            'phone' => 'required|string',
        ]);
        $userCheckEmail = User::where('email', $request->input('email'))->first();
        if ($userCheckEmail) throw ValidationException::withMessages(['notify' => 'Email đã tồn tại']);
        $userCheckPhone = User::where('phone', $request->input('phone'))->first();
        if ($userCheckPhone) throw ValidationException::withMessages(['notify' => 'Số điện thoại đã tồn tại']);
        $user = new User();
        $options = ['cost' => 12]; // Thay đổi cost để tăng độ an toàn (tăng chi phí tính toán)
        $hashedPassword = password_hash($request->input('password'), PASSWORD_BCRYPT, $options);

        $user->constructer(
            $request->first_name,
            $request->last_name,
            $request->email,
            $hashedPassword,
            $request->phone,
            ''
        );
        $user->save();
        return redirect('/auth/login');
    }
    public function login(Request $request)
    {
        $request->validate([
            "email" => 'required|email',
            "password" => 'required|string|min:8'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            throw ValidationException::withMessages(['notify' => 'Người dùng không tồn tại']);
        }
        if (password_verify($request->password, $user->password) == false) {
            throw ValidationException::withMessages(['notify' => 'Sai mật khẩu']);
        }
        Auth::login($user);
        return redirect('/');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
