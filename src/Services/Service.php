<?php
namespace Afilnet\Services;
class Service
{
    const URL = 'http://www.afilnet.com/api/http/';
    protected $user;
    protected $pass;

    public function __construct($user, $pass){
        $this->user = $user;
        $this->pass = $pass;
    }

    protected function curl($postFields_array)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => self::URL,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $postFields_array,
        ));
        $resultado = curl_exec($curl);
        curl_close($curl);

        return json_decode($resultado, true);
    }
}
