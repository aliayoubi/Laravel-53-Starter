<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param UserRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function index(UserRepository $repository)
    {
        $users = $repository->findAll();

        return view('home', compact('users'));
    }
}
