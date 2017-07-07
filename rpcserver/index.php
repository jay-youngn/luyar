<?php

$app = require_once __DIR__ . '/../bootstrap/rpcapp.php';

try {
    $rpc = new App\Services\Builder(Illuminate\Http\Request::capture()->path());
    $rpc->run();

} catch (App\Exceptions\ServerUndefinedException $e) {
    // 服务未定义
    exit($e->getMessage());
} catch (Exceptions $e) {
    throw $e;
}

// 这里有意不执行 $app->run(); 不加载lumen路由以及http kernel
