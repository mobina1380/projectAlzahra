<?php


namespace App\Classes;

use Illuminate\Http\Request;

class TagRecommander
{
    private $serviceUrl = 'http://135.181.118.81:8337/tag';
    private $user = 'chehreh';
    private $pass = 'ali110';


    public function query($input, $arguments=1)
    {
        $curl = curl_init();

        $payload = array(
            "quest" => $input,
            "arguments" => $arguments,
        );
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Basic '. base64_encode("{$this->user}:{$this->pass}")
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt_array($curl,
            array(
                CURLOPT_URL => $this->serviceUrl,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($payload),
                #CURLOPT_HEADER => true,
                CURLOPT_RETURNTRANSFER => true,
            )
        );
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}
