<?php

class Rest {
    
    private $result;
    private $status;
    private $arrangement;

    public function __construct($url) {
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $this->result = json_decode(curl_exec($client));
        $this->status = $this->result->status;
        $this->arrangement = $this->result->arrangement;
    }

    function getResult() {
        return $this->result;
    }

    function getStatus() {
        return $this->status;
    }

    function getArrangement() {
        return $this->arrangement;
    }

}
