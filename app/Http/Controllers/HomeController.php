<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resumeExists = PersonalDetails::where('user_id', Auth::user()->id)->exists();

        return view('home', compact('resumeExists'));
    }
}
