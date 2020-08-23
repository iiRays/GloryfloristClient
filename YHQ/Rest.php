<?php

class Rest {

    private $response;
    private $status;
    private $data;

    public function __construct($url) {
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true); 
        $this->response = json_decode(curl_exec($client)); 
        $this->status = $this->response->status;
        $this->data = $this->response->data;
        
    }
    
    // Getters and setters
    
    function getResponse() {
        return $this->response;
    }

    function getStatus() {
        return $this->status;
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

    function setData($data) {
        $this->data = $data;
    }







}
