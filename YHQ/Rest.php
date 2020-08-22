<?php

class Rest {

    private $response;
    private $status;
    private $hasData;
    private $data;

    public function __construct($url) {
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
        $this->response = json_decode(curl_exec($client)); 
        $this->status = $this->response->status;
        $this->hasData = $this->response->hasData;
        $this->data = $this->response->data;
        
    }
    
    // Getters and setters
    
    function getResponse() {
        return $this->response;
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

    function setResponse($response) {
        $this->response = $response;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setHasData($hasData) {
        $this->hasData = $hasData;
    }

    function setData($data) {
        $this->data = $data;
    }







}
