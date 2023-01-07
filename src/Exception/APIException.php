<?php

namespace Jitepay\JitepaySdkPhp\Exception;

class APIException extends \Exception
{
    public function APIException (string $message){
        $this->code = 422;
        $this->message = $message;
    }

}