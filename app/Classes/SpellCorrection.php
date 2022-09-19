<?php


namespace App\Classes;

use Illuminate\Http\Request;

class SpellCorrection
{
    private $serviceUrl1 = 'http://135.181.118.81:8082/spellCorrection/search';
    private $serviceUrl = 'http://135.181.118.81:8083/spellcorrection2/';
    private $loginUrl = 'http://135.181.118.81:8083/login';
    private $user = 'admin';
    private $pass = 'parsaSpellcorrection1401$';

    public function login()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->loginUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'username' => $this->user,
            'password' => $this->pass
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result);
    }
    public function query($input){
        $login = $this->login();

        $token = $login->access_token;
        $curl = curl_init();

        $payload = array(
            "text" => $input,
        );
        $headers = array(
            'Content-Type:application/json',
            'Authorization: Bearer '. $token
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
    public function query_old($input)
    {
        $curl = curl_init();

        $payload = array(
            "text" => $input,
        );
        curl_setopt_array($curl,
            array(
                CURLOPT_URL => $this->serviceUrl1,
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
