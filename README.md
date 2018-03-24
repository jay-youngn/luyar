# luyar
yar with lumen

### 快速开始

1. 部署项目，配置nginx到项目中的rpcserver文件夹中, index file: index.php
```

server
{
    listen 80;
    #listen [::]:80;
    server_name rpc.lumen.local;

    index index.php;
    root  /home/ginnerpeace/running/luyar/rpcserver;

    try_files $uri $uri/ /index.php?$args;

    # 省略fastcgi_params
    include enable-php-pathinfo.conf;

    access_log  /var/wwwlogs/rpc.lumen.local.log;
}

```

2. 创建需要暴露为服务的类，推荐使用这种方式提供rpc server，不要暴露其他不必要的方法，如:
```php
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

```

3. 配置server请求路径，config/rpcserver.php

```php
<?php

/**
 * path路径表示请求地址后的uri
 *
 * 如:
 *     'models/user' => App\Services\Model\User::class
 *
 * 表示:
 *     $client = new \Yar_Client('http://127.0.0.1:81/models/user');
 *     $client对象可使用 App\Services\Model\User 中的所有公共方法
 */
return [
    'path' => [
        'models/user' => App\Services\Model\User::class,
    ],
];

```

### 使用

`查看文档` 直接get访问 [domain]/models/user 页面，将看到server类中的public方法以及注释

![server-index](https://github.com/ginnerpeace/luyar/blob/master/resources/yar-server-doc.png)

`客户端调用`
```php
<?php

$client = new \Yar_Client('http://rpc.lumen.local/models/user');

$client->ping()；
// string 'pong' (length=4)

$client->create(['name' => '示例用户', 'mobile' => '11111111111'])；
/*
array (size=3)
  'code' => int 0
  'data' =>
    array (size=2)
      'name' => string '示例用户' (length=3)
      'mobile' => string '11111111111' (length=11)
  'error' => int 0
*/

```
