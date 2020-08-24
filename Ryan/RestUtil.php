<?php

class RestUtil {
    
    private $resp;
    private $status;
    private $hasData;
    private $data;

    public function __construct($url) {
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $this->resp = json_decode(curl_exec($client));
        $this->status = $this->resp->status;
        $this->hasData = $this->resp->hasData;
        $this->data = $this->resp->data;
    }
    
    function getResp() {
        return $this->resp;
    }

    function getStatus() {
        return $this->status;
    }

    function getHasData() {
        return $this->hasData;
    }

    function getData() {
        return $this->data;
    }
}
