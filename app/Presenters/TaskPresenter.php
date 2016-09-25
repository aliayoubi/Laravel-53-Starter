<?php
/**
 * Created by PhpStorm.
 * User: Sarfraz
 * Date: 9/25/2016
 * Time: 1:28 PM
 */

namespace App\Presenters;

use Hemp\Presenter\Presenter;

class TaskPresenter extends Presenter
{
    public function getCompletedAttribute()
    {
        return $this->model->completed == 0 ? 'No' : 'Yes';
    }
}