<?php

namespace App\Services;

use Exception;

/**
 * 基础方法定义
 *
 * 注意慎用public, 公共方法可被Yar_Client调用
 */
abstract class BaseServer
{
    /**
     * 服务健康报告
     * 可定时请求此方法以确认rpc服务正常
     *
     * - 无参数返回 'pong'
     * - 有参数的话会原样返回一个参数数组
     *
     * @return string | array
     */
    public function ping(...$args)
    {
        if (empty($args)) {
            return 'pong';
        }

        return $args;
    }

    /**
     * 统一返回数组结果
     *
     * @param  mixed $data
     * @param  integer $code
     * @return array
     */
    protected static function renderResponse($data = null, int $code = 0): array
    {
        return [
            'code' => $code,
            'data' => $data,
            'error' => 0,
        ];
    }

    /**
     * 错误时的返回
     *
     * @param  integer $code
     * @param  integer $error
     * @param  mixed $data
     * @return array
     */
    protected static function renderError(int $code = 1, int $error = 1, $data = null): array
    {
        return [
            'code' => $code,
            'data' => $data,
            'error' => $error,
        ];
    }

    /**
     * 整理原生异常返回
     *
     * @param  Exception $exception
     * @return array
     */
    protected static function renderException(Exception $exception)
    {
        return [
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            '_type' => get_class($exception),
        ];
    }

}
