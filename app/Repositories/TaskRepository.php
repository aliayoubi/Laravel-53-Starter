<?php
namespace App\Repositories;

use App\Models\Task;
use Rinvex\Repository\Repositories\EloquentRepository;

class TaskRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.tasks';

    protected $model = Task::class;
}