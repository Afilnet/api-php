<?php
namespace Afilnet\Services;
class SMS extends Service
{
    var $class = "sms";
    var $methods;

    public function __construct($user, $pass)
    {
        parent::__construct($user, $pass);
        $this->methods = [
            "send" => "send".$this->class,
            "sendFromTemplate" => "send".$this->class."fromtemplate",
            "sendToGroup" => "send".$this->class."togroup",
            "sendToGroupFromTemplate" => "send".$this->class."togroupfromtemplate",
            "getDeliveryStatus" => "getdeliverystatus",
        ];
    }

    /*
     * @param string $from Sender
     * @param string $to Mobile phone number of the recipient
     * @param string $msg SMS message to be sent
     * @param string $scheduletime (optional)Sending date and time in yyyy-mm-dd hh:mm:ss format
     * @param string $output (optional)Output format of the result
     *
     * @return array
     */
    public function send($from, $to, $msg, $scheduledatetime = null, $output = null){
        $postFields = array(
            'class' => $this->class,
            'method' => $this->methods["send"],
            'user' => $this->user,
            'password' => $this->pass,
            'from' => $from,
            'to' => $to,
            'sms' => $msg,
        );

        if ($scheduledatetime != null) $postFields[] = ["scheduledatetime" => $scheduledatetime];
        if ($output != null) $postFields[] = ["output" => $output];

        return $this->curl($postFields);
    }

    /*
     * @param string $to Destination cell number
     * @param string $idTemplate Template identifier
     * @param string $params Params to be changed in the template(Ex: 'mobile:123456789,name:test+name')
     * @param string $scheduletime (optional)Sending date and time in yyyy-mm-dd hh:mm:ss format
     * @param string $output (optional)Output format of the result
     *
     * @return array
     */
    public function sendFromTemplate($to, $idTemplate, $params = null, $scheduledatetime = null, $output = null){
        $postFields = array(
            'class' => $this->class,
            'method' => $this->methods["sendFromTemplate"],
            'user' => $this->user,
            'password' => $this->pass,
            'to' => $to,
            'idtemplate' => $idTemplate,
        );

        if ($params != null) $postFields[] = ["params" => $params];
        if ($scheduledatetime != null) $postFields[] = ["scheduledatetime" => $scheduledatetime];
        if ($output != null) $postFields[] = ["output" => $output];

        return $this->curl($postFields);
    }

    /*
     * @param string $from Sender
     * @param string $countryCode Dialling code of the country
     * @param string $idGroup Identifier of the destination group
     * @param string $msg SMS message to be sent
     * @param string $scheduletime (optional)Sending date and time in yyyy-mm-dd hh:mm:ss format
     * @param string $output (optional)Output format of the result
     *
     * @return array
     */
    public function sendToGroup($from, $countryCode, $idGroup, $msg, $scheduledatetime = null, $output = null){
        $postFields = array(
            'class' => $this->class,
            'method' => $this->methods["sendToGroup"],
            'user' => $this->user,
            'password' => $this->pass,
            'from' => $from,
            'countrycode' => $countryCode,
            'idgroup' => $idGroup,
            'sms' => $msg,
        );

        if ($scheduledatetime != null) $postFields[] = ["scheduledatetime" => $scheduledatetime];
        if ($output != null) $postFields[] = ["output" => $output];

        return $this->curl($postFields);
    }

    /*
     * @param string $countryCode Dialling code of the country
     * @param string $idGroup Identifier of the destination group
     * @param string $idTemplate Template identifier
     * @param string $params Params to be changed in the template(Ex: 'mobile:123456789,name:test+name')
     * @param string $scheduletime (optional)Sending date and time in yyyy-mm-dd hh:mm:ss format
     * @param string $output (optional)Output format of the result
     *
     * @return array
     */
    public function sendToGroupFromTemplate($countryCode, $idGroup, $idTemplate, $scheduledatetime = null, $output = null){
        $postFields = array(
            'class' => $this->class,
            'method' => $this->methods["sendToGroupFromTemplate"],
            'user' => $this->user,
            'password' => $this->pass,
            'countrycode' => $countryCode,
            'idgroup' => $idGroup,
            'idtemplate' => $idTemplate,
        );

        if ($scheduledatetime != null) $postFields[] = ["scheduledatetime" => $scheduledatetime];
        if ($output != null) $postFields[] = ["output" => $output];

        return $this->curl($postFields);
    }

    /*
     * @param string $ids IDs of SMS separated by commas (,)
     *
     * @return array
     */
    public function getDeliveryStatus($ids){
        $postFields = array(
            'class' => $this->class,
            'method' => $this->methods["getDeliveryStatus"],
            'user' => $this->user,
            'password' => $this->pass,
            'messages' => $ids,
        );

        return $resultadoEnvio = $this->curl($postFields);
    }
}
