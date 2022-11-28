<?php

namespace App\Http\Controllers;

class LogoutController extends Controller
{
    public function perform()
    {
        session()->flush();

        auth()->logout();

        return redirect('login');
    }
}
