<?php

namespace Test\Transactional;

require_once 'AbstractService.php';

use Experimental\DI\AOP\transactions\AbstractService;
use Logger;
use Exception;
/**
 * Created by JetBrains PhpStorm.
 * User: jaehoo
 * Date: 20/07/13
 * Time: 13:46
 * To change this template use File | Settings | File Templates.
 */
class TransactionalService3 extends AbstractService {

    /**
     * @var Logger
     */
    private $log;

    function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
    }

    public function doBusinessJob(){

        $this->log->info("Run complex process!");
        $this->log->info("Connection is Open: ".$this->entityManager->isOpen());

    }

    public function doBusinessProcess(){

        $this->log->info("Complex process...");
        throw new Exception("MY EXCEPTION :p ***************");

    }
}

