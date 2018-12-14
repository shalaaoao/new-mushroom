<?php

use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
    // called while socket on connect
//    var_dump($request->fd, $request->get, $request->server);
//    $websocket->push($websocket->fd, "hello, welcome\n");
//    var_dump($websocket);
    var_dump('in connect');
});

Websocket::on('disconnect', function ($websocket) {
    // called while socket on disconnect
});

Websocket::on('example', function ($websocket, $data) {
    $websocket->emit('message', $data);
    var_dump('in example');

});

// Websocket::on('test', 'ExampleController@method');