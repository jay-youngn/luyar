<?php

namespace App\Services\Model;

use App\Services\BaseServer;

/**
 * 用户相关
 */
class User extends BaseServer
{

    /**
     * 创建用户(示例)
     * @author gjy <ginnerpeace@live.com>
     *
     * @param  array $user
     * @return array
     */
    public static function create(array $user): array
    {
        // 代码逻辑
        // \DB::table('user')->insert($user);
        //
        return static::renderResponse($user);
    }

}
