<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scanUserController extends Controller
{
    public function index()
    {
        return view('scanUser');
    }
}
