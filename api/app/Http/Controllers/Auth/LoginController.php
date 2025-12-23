<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Application\Auth\LoginUser;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function __construct(
        private LoginUser $login
    ) {}

    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $token = $this->login->execute(
            $request->email,
            $request->password
        );

        return response()->json([
            'token' => $token,
        ]);
    }
}
