<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home.index', ['title' => 'Welcome']);
    }

    public function dashboard()
    {
        return view('pages.dashboard.index', ['title' => 'Dashboard']);
    }
}
