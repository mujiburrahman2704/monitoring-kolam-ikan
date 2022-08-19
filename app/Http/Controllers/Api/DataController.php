<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Data;
use Illuminate\Http\Request;
use Salman\Mqtt\MqttClass\Mqtt;

class DataController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $posts = Data::all();
        if($posts){
            return DataResource::create(200,'success', $posts);
        }else{
            return DataResource::create(400,'failed');
        }
        //return collection of posts as a resource
        return new Dataresource(true, 'List Data Posts', $posts);
    }

    
}
