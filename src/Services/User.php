<?php
namespace Afilnet\Services;
class User extends Service
{
    var $class = "user";

    /*
     * @return array
     */
    public function getBalance(){
        $postFields = array(
            'class' => $this->class,
            'method' => "getbalance",
            'user' => $this->user,
            'password' => $this->pass,
        );

        return $this->curl($postFields);
    }

    public function getUsername(){
        return $this->user;
    }
}
