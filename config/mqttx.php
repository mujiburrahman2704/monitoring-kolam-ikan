<?php
return [
    'host'     => env('mqtt_host','broker.emqx.io'),
    'password' => env('mqtt_password','public'),
    'username' => env('mqtt_username','emqx'),
    'certfile' => env('mqtt_cert_file',''),
    'port'     => env('mqtt_port','1883'),
    'debug'    => env('mqtt_debug',false),
    'qos'      => env('mqtt_qos', 0),
    'retain'   => env('mqtt_retain', 0)
];