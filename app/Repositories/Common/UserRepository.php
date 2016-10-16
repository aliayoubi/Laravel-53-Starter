<?php
namespace App\Repositories\Common;

use App\Models\Common\User;
use Rinvex\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.users';

    protected $model = User::class;
}