<?php

// $http = new Swoole\Http\Server("0.0.0.0", 8077);

// $http->on('request', function ($request, $response) {
//     $response->end($request->rawContent());
// });

// $http->start();

$server = new Swoole\WebSocket\Server("0.0.0.0", 8080);


$server->on('open', function (Swoole\WebSocket\Server $server, $request) {
    echo "Client connected: {$request->fd}\n";
    //$server->push($request->fd, "Welcome to the Swoole WebSocket server!");
});

$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
    echo "Received message: {$frame->data}\n";
    $origin = $frame->fd;
    foreach ($server->connections as $conexao) {
        if ( $conexao === $origin ) continue;
        $server->push(
            $conexao,
            json_encode(['type' => 'chat', 'text' => $frame->data])
        );
    }
});

$server->start();
