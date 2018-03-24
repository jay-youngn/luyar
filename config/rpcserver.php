<?php

/**
 * path路径表示请求地址后的uri
 *
 * 如:
 *     'module/user' => App\Services\Module\User::class
 *
 * 表示:
 *     $client = new \Yar_Client('http://127.0.0.1:81/module/user');
 *     $client对象可调用 App\Services\Module\User 中的所有公共方法
 */
return [
    'path' => [
        'module/user' => App\Services\Module\User::class,
    ],
];
