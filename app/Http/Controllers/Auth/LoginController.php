<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BoardController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // 인증 성공 시
            return redirect()->action([BoardController::class, 'index']);
        }

        // 인증 실패 시
        return redirect()->back()->withInput()->withErrors([
            'username' => '아이디 또는 비밀번호가 일치하지 않습니다.',
        ]);
    }
}
