<?php

namespace App\Services;

use App\Exceptions\ServerUndefinedException;
use Yar_Server;

/**
 * RPC Server Builder
 */
class Builder
{
    private $server;

    public function __construct(string $path)
    {
        $class = $this->parseServer($path);
        $this->server = new Yar_Server(new $class);
    }

    public function parseServer($path)
    {
        $server = config('rpcserver.path.' . $path);
        if (! $server) {
            throw new ServerUndefinedException('Server path undefined.');
        }

        return $server;
    }

    public function run()
    {
        $this->server->handle();
    }
}
