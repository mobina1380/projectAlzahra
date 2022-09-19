<?php


namespace App\Classes;

use Illuminate\Http\Request;

class Summarization
{
    private $serviceUrl = 'http://135.181.118.81:8181/summarization';
    private $user = 'admin';
    private $pass = 'parsaqa';

    public function query($input)
    {
        $curl = curl_init();

        $payload = array(
            "question" => $input,
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
