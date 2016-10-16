<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\Frontend\TasksDataTable;
use App\Models\Frontend\Task;
use App\Repositories\Frontend\TaskRepository;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $repository = null;

    // our repository to be used in entire controller
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    // show listing
    public function index(TasksDataTable $dataTable)
    {
        $title = 'Dashboard';

        return $dataTable->render('frontend.pages.dashboard.index', compact('title'));
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

        return view('frontend.pages.dashboard.edit', compact('title', 'task'));
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
