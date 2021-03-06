<?php

namespace App\Http\Controllers\Frontend\Auth;

use Alert;
use App\Http\Controllers\Frontend\Controller;
use App\Models\Common\User;
use App\Notifications\UserWasRegistered;
use App\Repositories\Common\UserRepository;
use Flash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $repository = new UserRepository;

        list($status, $user) = $repository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // send ^notification^ email if user was created successfully
        if ($status) {
            $user->notify(new UserWasRegistered($user));

            Flash::success('Your account has been created successfully!');
            Alert::success($user->name, 'Welcome!')->persistent('Close');
        }

        return $user;
    }
}
