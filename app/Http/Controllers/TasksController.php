<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Flash;
use Illuminate\Http\Request;
use Redirect;

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

        list($status, $model) = $this->repository->create($data);

        if (!$status) {
            return Redirect::back()->withErrors($model->errors());
        }

        Flash::success(self::ADD_MESSAGE);
        return Redirect::back();
    }
}
