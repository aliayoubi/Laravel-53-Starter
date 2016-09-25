<?php

namespace App\Http\Controllers;

use App\DataTables\TasksDataTable;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    // our repository to be used in entire controller
    protected $repository = null;

    // assign our model repository for the controller
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    // show listing
    public function index(TasksDataTable $dataTable)
    {
        $title = 'Dashboard';

        return $dataTable->render('pages.dashboard.index', compact('title'));
    }

    // create
    public function store(Request $request)
    {
        // add "user_id" before saving
        $request->request->add(['user_id' => $request->user()->id]);

        // create and redirect by showing flash message
        return $this->createRecord($this->repository);
    }

    // update task "complete" status
    public function complete(Task $task)
    {
        $task->completed = $task->completed == 1 ? 0 : 1;

        return $this->updateRecord($this->repository, $task);
    }

    // edit page
    public function edit(Task $task)
    {
        $title = 'Edit Task';

        // show only if logged user is owner of this record
        $this->isOwner($task);

        return view('pages.dashboard.edit', compact('title', 'task'));
    }

    // update
    public function update(Task $task)
    {
        return $this->updateRecord($this->repository, $task);
    }

    // delete
    public function destroy(Task $task)
    {
        // delete only if logged user is owner of this record
        $this->isOwner($task);

        return $this->deleteRecord($this->repository, $task);
    }
}
