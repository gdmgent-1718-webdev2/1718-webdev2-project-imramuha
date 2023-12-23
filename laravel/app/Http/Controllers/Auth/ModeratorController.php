<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Moderator');
    }

    //Index method for Admin Controller
    public function index()
    {
        return view('auth.moderator.acces');
    }
}
