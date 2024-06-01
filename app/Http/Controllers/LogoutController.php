<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function realizaLogout(Request $request){
        //realiza o logout
        Auth::logout();

        //invalidamos e destruímos a sessão
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //redireciona para a rota de login
        return redirect()->route('login.index');
    }
}
