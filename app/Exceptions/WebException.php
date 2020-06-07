<?php

namespace App\Exceptions;

use ErrorException;
use Exception;

/**
 * Class SafeException
 *
 * @package App\Exceptions
 */
class WebException extends ErrorException
{
    protected $details;

    /**
     * ExceptionWithDetails constructor.
     *
     * @param string $message
     * @param array $details
     * @param int $code [optional]
     * @param Exception|null $previous
     */
    public function __construct($message, $details = [], $code = 0, Exception $previous = null)
    {
        $this->details = $details;
        parent::__construct($message, $code, $previous);
    }

    public function getDetails()
    {
        return $this->details;
    }
}
