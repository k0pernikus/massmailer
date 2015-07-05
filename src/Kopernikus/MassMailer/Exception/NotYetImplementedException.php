<?php
namespace Kopernikus\MassMailer\Exception;

use Exception;

/**
 * Class NotYetImplementedException
 * @package Kopernikus\MassMailer\Exception
 */
class NotYetImplementedException extends \RuntimeException
{
    /**
     * @param string         $message
     * @param int            $code
     * @param Exception|null $previous
     */
    public function __construct($message = "Not yet implemented.", $code = 0, Exception $previous = null)
    {
    }

}