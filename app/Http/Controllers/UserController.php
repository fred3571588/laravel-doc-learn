<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        # code...
        return view('welcome');
    }

    public function show(Request $request)
    {
        $value = $request->session()->get('key','default');
        dd($value);
    }
}
