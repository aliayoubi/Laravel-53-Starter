<?php

namespace App\Http\Controllers;

use Alert;
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

    public function __construct()
    {
        // any common stuff
    }

    /**
     * Check whether logged user owns model record.
     *
     * Seems to be much simpler approach than using Laravel Gates or Policies.
     *
     * @param $model
     * @param string $userField
     * @return bool
     */
    public function isOwner($model, $userField = 'user_id')
    {
        if ($model->$userField == auth()->user()->id) {
            return true;
        }

        abort(404);
    }

    /**
     * create a record and optionally redirect back
     *
     * @param $repository
     * @param array $data
     * @param bool $redirectBack
     * @return mixed
     */
    public function createRecord($repository, $data = [], $redirectBack = true)
    {
        if ($data) {
            list($status, $instance) = $repository->create($data);
        } else {
            list($status, $instance) = $repository->create();
        }

        return $this->response($redirectBack, $status, $instance, self::ADD_MESSAGE);
    }

    /**
     * update a record and optionally redirect back
     *
     * @param $repository
     * @param $model
     * @param bool $redirectBack
     * @return mixed
     */
    public function updateRecord($repository, $model, $redirectBack = true)
    {
        list($status, $instance) = $repository->update($model->id, $model->toArray());

        return $this->response($redirectBack, $status, $instance, self::UPDATE_MESSAGE);
    }

    /**
     * deletes a record and optionally redirect back
     *
     * @param $repository
     * @param $model
     * @param bool $redirectBack
     * @return mixed
     */
    public function deleteRecord($repository, $model, $redirectBack = true)
    {
        list($status, $instance) = $repository->delete($model->id);

        return $this->response($redirectBack, $status, $instance, self::DELETE_MESSAGE);
    }

    /**
     * @param $redirectBack
     * @param $status
     * @param $instance
     * @param $message
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    protected function response($redirectBack, $status, $instance, $message)
    {
        if (!$status) {
            if ($redirectBack) {
                return Redirect::back()->withErrors($instance->errors());
            }

            // in case of ajax, etc
            return $instance->errors();
        }
        
        if ($redirectBack) {
            Flash::success($message);
            Alert::success($message, 'Success!')->autoclose(5000);

            return Redirect::back();
        }

        // in case of ajax, etc
        return $status;
    }
}
