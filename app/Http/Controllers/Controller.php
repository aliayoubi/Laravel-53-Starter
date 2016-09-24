<?php

namespace App\Http\Controllers;

use Flash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Redirect;

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

    /**
     * Adds "user_id" value of logged user to provided array
     *
     * @param $data
     * @return mixed
     */
    public function addLoggedUser(&$data)
    {
        $data['user_id'] = auth()->user()->id;
    }

    /**
     * create and redirects to last page
     *
     * @param $repository
     * @param $data
     * @return mixed
     */
    public function createAndRedirect($repository, $data)
    {
        list($status, $instance) = $repository->create($data);

        if (!$status) {
            return Redirect::back()->withErrors($instance->errors());
        }

        Flash::success(self::ADD_MESSAGE);

        return Redirect::back();
    }

    /**
     * update and redirects to last page
     *
     * @param $repository
     * @param $data
     * @return mixed
     */
    public function updateAndRedirect($repository, $data)
    {
        list($status, $instance) = $repository->update($repository->id, $data);

        if (!$status) {
            return Redirect::back()->withErrors($instance->errors());
        }

        Flash::success(self::UPDATE_MESSAGE);

        return Redirect::back();
    }

    /**
     * deletes and redirects to last page
     *
     * @param $repository
     * @return mixed
     */
    public function deleteAndRedirect($repository)
    {
        list($status, $instance) = $repository->delete($repository->id);

        if (!$status) {
            return Redirect::back()->withErrors($instance->errors());
        }

        Flash::success(self::DELETE_MESSAGE);

        return Redirect::back();
    }
}
