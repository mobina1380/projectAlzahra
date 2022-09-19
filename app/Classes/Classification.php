<?php


namespace App\Classes;

use Illuminate\Http\Request;

class Classification
{
    private $serviceUrl = 'http://135.181.118.81:1090/classification/';
    private $user = 'ParsaQA';
    private $pass = 'swordfish';

    //models = category, age , gender
    //lang = fa, ar
    public function query($input,$model,$lang)
    {
        $ch = curl_init();


        $payload = array(
            "text" => $input,
            "model" => $model,
            "lang" => $lang,

        );
        $headers = array(
            'Content-Type: application/json',
            'Authorization: Basic '. base64_encode("{$this->user}:{$this->pass}")
        );
        $headers[] = 'Accept: */*';
        $headers[] = 'Accept-Encoding: gzip, deflate';
        curl_setopt($ch, CURLOPT_URL, $this->serviceUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }
}
