<?php

namespace App\Objects;

use \Exception;
use Illuminate\Support\Facades\Log;

class ErrorMessage{

    private $message;

    function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     *  Create string
     *
     * @param Exception $exception
     * @param string $class
     * @param string $method
     * @return string
     */
    public static function exceptionToString(Exception $exception, $class = 'no-class', $method = 'no-method')
    {
        return $class . "::" . $method . "\n" . $exception->getMessage() . "\n" . $exception->getCode() . "\n" . substr($exception->getTraceAsString(), 0, 1200);
    }


    /**
     *Send notification to slack
     * @param string|null $route
     */
    public function notify(string $route = null)
    {
        try{
            //TODO: THIS PART PRETEND TO SENT MESSAGE INFO IN SOME PLATAFORM, IN MY CASE I CAN USE SLACK

        }catch (\Exception $exception){
            Log::debug('production_error' . $exception->getMessage());
        }
    }
}