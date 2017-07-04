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
