<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $repository = null;

    // assign our model repository in controller
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    // show listing/page
    public function index()
    {
        $title = 'Dashboard';

        // get logged-in user's date
        $repository = $this->userData($this->repository);

        return view('pages.dashboard.index', compact('title', 'repository'));
    }

    // create
    public function store(Request $request)
    {
        $data = $request->all();
        
        // add "user_id" also to $data
        $this->addLoggedUser($data);
        
        // create and redirect by showing flash message
        return $this->createAndRedirect($this->repository, $data);
    }
}
