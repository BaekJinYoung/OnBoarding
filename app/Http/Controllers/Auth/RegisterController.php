<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BoardController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $register;

    public function __construct(User $register){
        $this->register = $register;
    }
    public function registerService(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nickname' => 'required'
        ]);
        $this->register->create($request);

        return redirect()->action([LoginController::class, 'showLoginForm']);
    }
}
