<?php
/**
 * Created by Alberto Sánchez.
 * Date: 11/07/13
 * Time: 06:43 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */

require_once __DIR__.'/../../../include.php';


Logger::configure('../../resources/log4php.xml');
$log = Logger::getLogger("main");
$log->debug("PATH: ".ini_get('include_path'));

/*
http://logging.apache.org/log4php/index.html
log examples:*/
$log->info("foo");
$log->warn("bar");
$log->trace("My first message.");   // Not logged because TRACE < WARN
$log->debug("My second message.");  // Not logged because DEBUG < WARN
$log->info("My third message.");    // Not logged because INFO < WARN
$log->warn("My fourth message.");   // Logged because WARN >= WARN
$log->error("My fifth message.");   // Logged because ERROR >= WARN
$log->fatal("My sixth message.");   // Logged because FATAL >= WARN