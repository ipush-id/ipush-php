<?php 

namespace Zuramai\Ipush;

use Exception;

class Ipush {
    private $wsUrl;
    private $appId;
    private $apiKey;
    private $apiSecret;
    private $ws;
    public function __construct($wsUrl, $appId, $apiKey, $apiSecret) {
        $this->wsUrl = $wsUrl;
        $this->appId = $appId;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        
        $this->connect();
    }
    
    private function build_url() {
        $query = http_build_query([
            'appId' => $this->appId,
            'apiKey' => $this->apiKey,
            'apiSecret' => $this->apiSecret,
        ]);
        return $this->wsUrl . "?" . $query;
    }

    private function connect() {
        $url = $this->build_url();
        $client = new \WebSocket\Client($url);
        $client->receive();
        $this->ws = $client;
        return $client;
    }

    public function trigger($channel, $event, $data) {
        $msg = [
            "type" => "message",
            "channel" => $channel,
            "event" => $event,
            "data" => $data,
        ];
        $this->ws->text(json_encode($msg));
    }
}