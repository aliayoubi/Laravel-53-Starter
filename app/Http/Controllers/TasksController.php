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

        return view('pages.dashboard.index', compact('title'));
    }

    // create
    public function store(Request $request)
    {
        $data = $request->all();
        $this->addLoggedUser($data);

        return $this->createAndRedirect($this->repository, $data);
    }
}
