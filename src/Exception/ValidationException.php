<?php

namespace Jitepay\JitepaySdkPhp\Exception;

class ValidationException extends \Exception
{
    public function ValidationException(string $message) {
        echo $message;
    }
}