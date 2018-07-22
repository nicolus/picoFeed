<?php

namespace PicoFeed\Logging;

use DateTime;
use DateTimeZone;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Logging class.
 *
 * @author  Frederic Guillot
 */
class Logger
{
    /**
     * PSR-3 Logger to use (logging is disabled if no Logger is set).
     *
     * @static
     *
     * @var LoggerInterface
     */
    public static $logger = null;


    public static function setLogger(LoggerInterface $logger)
    {
        self::$logger = $logger;
    }

    /**
     * Add a new message.
     *
     * @static
     *
     * @param string $message Message
     */
    public static function setMessage($message)
    {
        if (self::$logger) {
            self::$logger->debug($message);
        }
    }
}
