<?php

namespace Popbox\Loging;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

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
            // $response = \Httpful\Request::post($this->url)
            // ->sendsJson()    
            // ->addHeader('Authorization', 'Bearer '. $this->token)
            // ->body(json_encode($logs))
            // ->send();

            $client = new Client([
                'base_uri' => $this->url, // Base URI is used with relative requests
                'headers' => array(
                        'Content-Type'       => 'application/json',
                        'Authorization'      => 'Bearer '. $this->token,
                    ),
            ]);

            $promise = $client->postAsync($this->url, ['json' => $logs ]);
            $response = $promise->wait();
        }
    }
}