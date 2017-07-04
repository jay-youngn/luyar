<?php

require_once __DIR__ . '/../vendor/autoload.php';

try {
    /**
     * 加载项目 .env
     */
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();

    /**
     * 创建lumen应用
     */
    $app = new Laravel\Lumen\Application(
        realpath(__DIR__ . '/../')
    );

    /**
     * 使用 Illuminate 组件
     */
    $app->withFacades();
    // $app->withEloquent();

    /**
     * 加载配置
     */
    $app->configure('rpcserver'); // required
    $app->configure('database');
    // $app->configure('cache');
    // $app->configure('queue');

    /**
     * 注册容器
     */
    $app->singleton(
        Illuminate\Contracts\Debug\ExceptionHandler::class,
        App\Exceptions\Handler::class
    );

    /**
     * 注册服务提供者
     */
    $app->register(App\Providers\AppServiceProvider::class);
    $app->register(Illuminate\Redis\RedisServiceProvider::class);

    define('LUMEN_START', microtime(true));

    return $app;

} catch (Dotenv\Exception\InvalidPathException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}

exit('<br>厉害了');
