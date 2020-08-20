<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author Johann Lee Jia Xuan
 */
class Rest {
    
    // For this to work, we assume that the JSON reply will be:
    // {status = statusCode, message = replyMessage, data = resultObject}
    
    private $response;
    private $status;
    private $message;
    private $data;

    public function __construct($url) {
        $client = curl_init($url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $this->response = json_decode(curl_exec($client));
        $this->status = $this->response->status;
        $this->message = $this->response->message;
        $this->data = $this->response->data;
    }
    
    // Getters and setters
    
    function getResponse() {
        return $this->response;
    }

    function getStatus() {
        return $this->status;
    }

    function getMessage() {
        return $this->message;
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

    function setMessage($message) {
        $this->message = $message;
    }

    function setData($data) {
        $this->data = $data;
    }







}
