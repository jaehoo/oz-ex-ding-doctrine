<?php
/**
 * Created by Alberto Sánchez.
 * Date: 11/07/13
 * Time: 06:43 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */
class SimpleLoggerTest extends PHPUnit_Framework_TestCase{

    private $log;

    function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
    }

    public function testLogLevels()
    {

        $this->log->info("foo");
        $this->log->warn("bar");
        $this->log->trace("My first message.");   // Not logged because TRACE < WARN
        $this->log->debug("My second message.");  // Not logged because DEBUG < WARN
        $this->log->info("My third message.");    // Not logged because INFO < WARN
        $this->log->warn("My fourth message.");   // Logged because WARN >= WARN
        $this->log->error("My fifth message.");   // Logged because ERROR >= WARN
        $this->log->fatal("My sixth message.");   // Logged because FATAL >= WARN

    }
}


