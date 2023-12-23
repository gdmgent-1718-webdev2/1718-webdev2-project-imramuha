<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class NoAccesController extends Controller
{
    public function __construct()
    {
       
    }

    //Index method for Admin Controller
    public function index()
    {
        auth('web')->logout();
        return view('auth.no-acces.acces');
    }

    //No acces for moderator
    public function indexModerator()
    {
        return view('auth.moderator.acces');
    }
}
