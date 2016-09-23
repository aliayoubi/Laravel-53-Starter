<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $repository = null;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $title = 'Dashboard';

        return view('pages.dashboard.index', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        
        return $this->createAndRedirect($this->repository, $data);
    }
}
