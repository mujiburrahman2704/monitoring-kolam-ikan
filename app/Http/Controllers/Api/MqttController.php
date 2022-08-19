<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mqtt;
use Salman\Mqtt\Facades\Mqtt as FacadesMqtt;

class MqttController extends Controller
{
    public function index()
    {
        $topic = "/6720/PH";

        FacadesMqtt::ConnectAndSubscribe($topic, function($topic, $msg){
            echo "Msg Received: \n";
            echo "Topic: {$topic}\n\n";
            echo "\t$msg\n\n";
        });
    }
}
