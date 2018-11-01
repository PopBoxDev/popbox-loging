<?php

namespace Popbox\Loging;

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
            $client = new Amp\Artax\DefaultClient();
            $headers = array(
                'Content-Type'=>'application/json',
                'Authorization'=> 'Bearer '.$this->token
            );
            $request = (new Amp\Artax\Request($this->url, "POST"))
                ->withHeaders($headers)
                ->withBody($logs);       
            $response = yield $client->request($request);
            var_dump($response->getStatus(), $response->getReason());
        }
    }
}