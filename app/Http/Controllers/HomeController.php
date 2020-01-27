<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'profile']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->isClient())
            return view('client.home', compact('user'));
        if ($user->isCompany())
            return view('company.home', compact('user'));
        abort(404);
        return null;
    }

    public function profile(User $user)
    {

        if ($user->isClient())
            return view('client.profile', compact('user'));
        if ($user->isCompany())
            return view('company.profile', compact('user'));

        abort(404);
    }
}
