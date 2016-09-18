<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // used as flash messages
    const ADD_MESSAGE = 'Added Successfully!';
    const DELETE_MESSAGE = 'Deleted Successfully!';
    const UPDATE_MESSAGE = 'Updated Successfully!';

    // for common stuff
    public function __construct()
    {
        //
    }
}
