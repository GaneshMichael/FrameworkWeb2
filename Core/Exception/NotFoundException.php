<?php

namespace TCG\Core\Exception;

use Throwable;

class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    // Convert the exception to a string representation.
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}";
    }

}