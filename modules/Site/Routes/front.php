<?php
use Illuminate\Routing\Router;

// Site 模块前台路由
$router->group(['prefix' =>'/','module'=>'site'], function (Router $router) {
    
    // 首页
    $router->get('/', 'IndexController@index')->name('index');

    //登录
    $router->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $router->post('login', 'Auth\LoginController@login');
    $router->post('logout', 'Auth\LoginController@logout')->name('logout');

    //注册
    $router->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $router->post('register', 'Auth\RegisterController@register');

    //重置密码,找回密码
    $router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $router->post('password/reset', 'Auth\ResetPasswordController@reset');
});


// Site 模块前台路由
$router->group(['prefix' =>'/site','module'=>'site'], function (Router $router) {
    
    // 首页
    $router->get('/', 'IndexController@index')->name('site.index');
});
