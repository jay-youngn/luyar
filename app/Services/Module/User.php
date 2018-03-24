<?php

namespace App\Services\Module;

use App\Services\BaseServer;

/**
 * 用户模块
 */
class User extends BaseServer
{

    /**
     * 创建用户
     *
     * @author gjy <ginnerpeace@live.com>
     *
     * @param  array $user
     * @return array
     */
    public function create(array $user): array
    {
        // 返回值示例
        return $this->response($user);

        // 业务代码示例
        $userModel = UserModel::create($user);
        return $this->response($userModel->attributesToArray());
    }

}
