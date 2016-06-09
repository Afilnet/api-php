<?php
namespace Afilnet;

class Afilnet
{
    public $user;
    public $sms;
    public $email;
    public $voice;

    /*
     * @param string $user Username
     * @param string $pass Password
     *
     * @return boolean
     */
    public function login($user, $pass)
    {
        $this->user = new Services\User($user, $pass);
        $check = $this->user->getBalance();

        if ($check["status"]=="SUCCESS") {
            $this->sms = new Services\SMS($user, $pass);
            $this->email = new Services\Email($user, $pass);
            $this->voice = new Services\Voice($user, $pass);
            return true;
        } else {
            $this->user = null;
            return false;
        }
    }
}
