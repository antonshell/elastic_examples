<?php

namespace src;

/**
 * Class Curl
 * @package DIY\ElasticSuite\Helper
 */
class Curl
{
    private $disableSslVerify = false;


    public function sendRequest($url, $method='GET', $data = '', $headers = []){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if($data){
            if(is_array($data)){
                $data = json_encode($data);
            }

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if($this->disableSslVerify){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        if(count($headers)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $result = curl_exec($ch);

        $result = json_decode($result,true);

        return $result;
    }

    /**
     * @param $url
     * @param $headers
     * @return mixed
     */
    public function sendGetRequest($url, $headers = []){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");



        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if($this->disableSslVerify){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        if(count($headers)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $result = curl_exec($ch);

        $result = json_decode($result,true);

        return $result;
    }

    /**
     * @param $url
     * @param $data
     * @param $headers
     * @return mixed
     */
    public function sendPostRequest($url,$data = '', array $headers = []){
        if(is_array($data)){
            $data = json_encode($data);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if($this->disableSslVerify){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        if(count($headers)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $result = curl_exec($ch);

        $result = json_decode($result,true);

        return $result;
    }

    /**
     * @param $url
     * @param $data
     * @param $headers
     * @return mixed
     */
    public function sendPutRequest($url,$data = '', array $headers = []){
        if(is_array($data)){
            $data = json_encode($data);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if($this->disableSslVerify){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        if(count($headers)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $result = curl_exec($ch);

        $result = json_decode($result,true);

        return $result;
    }

    /**
     * @param $url
     * @param $headers
     * @return mixed
     */
    public function sendDeleteRequest($url,$headers = []){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if($this->disableSslVerify){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        if(count($headers)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $result = curl_exec($ch);

        $result = json_decode($result,true);

        return $result;
    }
}