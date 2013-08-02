<?php

namespace Experimental\DI;

use Ding\Aspect\MethodInvocation;
use Logger;

/**
 * @Aspect
 */
class AnAspectTest {

    private $log;

    function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
    }


    /**
     * MethodInterceptor(class-expression="TestService", expression=".*execute")
     * @MethodInterceptor(class-expression="TestService", expression="execute")
     */
    public function testLog(MethodInvocation $methodInvocation){

        $this->log->info("intercepted Method");

        $this->log->info("Execution of "
        . $methodInvocation->getOriginalInvocation()->getClass()
        . "::" . $methodInvocation->getOriginalInvocation()->getMethod());


        //$method = $methodInvocation->getMethod();
        $methodInvocation->proceed();


        $this->log->info(" ¬¬ jojojo");
        //$originalInvocation = $invocation->getOriginalInvocation();
        //$ret = $invocation->proceed();
    }

}