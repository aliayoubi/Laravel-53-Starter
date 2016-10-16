<?php
namespace App\Repositories\Frontend;

use App\Models\Frontend\Task;
use Rinvex\Repository\Repositories\EloquentRepository;

class TaskRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.tasks';

    protected $model = Task::class;
}