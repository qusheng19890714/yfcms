<?php

namespace Modules\Site\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Base\FrontController;
use Modules\Core\Http\Requests\UserRequest;
use Modules\Core\Models\User;

class UsersController extends FrontController
{
    /**
     * 首页
     *
     * @return Response
     */
    public function index()
    {
        return $this->view();
    }

    /**
     * 新建
     * 
     * @return Response
     */
    public function create()
    {
        return $this->view();
    }

    /**
     * 保存
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 显示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->view('users.show', compact('user'));
    }    

    /**
     * 编辑
     *
     * @return Response
     */
    public function edit(User $user)
    {
        return $this->view('users.edit', compact('user'));
    }

    /**
     * 更新
     *
     * @param  Request $request
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功');
    }

    /**
     * 删除
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}