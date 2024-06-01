<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    
    //monta pagina inicial
    public function showPageInitial(){
        
        $user = auth()->user();
        
        return view('index', ['users' => $user]);
    }
}
