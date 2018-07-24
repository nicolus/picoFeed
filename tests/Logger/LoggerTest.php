<?php

namespace PicoFeed\Logging;

use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

class LoggerTest extends TestCase
{
    public function testSetLogger()
    {
        $logger = new NullLogger();
        Logger::setLogger($logger);
        $this->assertInstanceOf(
            NullLogger::class,
            Logger::$logger
        );
    }

    public function testLogMessage()
    {
        $message = "I'm logging stuff";
        $stream = fopen('php://memory', 'w+');

        $logger = new \Monolog\Logger('test');
        $handler = new \Monolog\Handler\StreamHandler($stream);
        $logger->pushHandler($handler);

        Logger::setLogger($logger);
        Logger::setMessage($message);

        rewind($stream);

        $this->assertContains($message, stream_get_contents($stream));

    }
}
