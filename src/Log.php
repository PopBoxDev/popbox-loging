<?php

namespace Popbox\Loging;

use GuzzleHttp\Client as Client;
use GuzzleHttp\Psr7\Request as Request;

class Log{

    private $url;
    private $toke;

    public function __construct($url, $token){
        $this->url = $url;
        $this->token = $token;
    }

    public function setUrl($url){
        $this->url = $url;
    }

    public function getUrl(){
        return $this->url;
    }

    public function setToken($token){
        $this->token = $token;
    }

    public function getToken(){
        return $this->token;
    }

    public function write($logs){
        if($this->url & $this->token){
            $client = new Client();
            $request = new Request('POST', $this->url);
            $request->setHeader('Content-Type', 'application/json');
            $request->setHeader('Authorization','Bearer '.$this->token);
            $request->setBody($logs);
            $promise = $client->sendAsync($request)->then(function ($response) {
                //echo 'I completed! ' . $response->getBody();
            });
            $promise->wait();
        }
    }
}