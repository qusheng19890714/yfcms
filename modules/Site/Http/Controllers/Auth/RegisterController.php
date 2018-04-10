<?php

namespace Modules\Site\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Modules\Core\Base\FrontController;
use Modules\Core\Models\User;

class RegisterController extends FrontController
{
    use RegistersUsers;

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }


    /**
     * 注册
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return $this->view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [

            'username'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'captcha'  => 'required|captcha'
        ],[
            'captcha.required' => '验证码不能为空',
            'captcha.captcha'  => '验证码不正确'
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'modelid' => 'user',
            'password' => bcrypt($data['password']),
        ]);
    }

}