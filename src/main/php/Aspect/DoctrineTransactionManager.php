<?php
/**
 * Created by Alberto Sánchez.
 * Date: 17/07/13
 * Time: 05:30 PM
 * Contact to: <a href="mailto:jaehoo@gmail.com">My mail</a>
 * Twitter: @Jaehoox
 */
namespace Aspect;

use Ding\Aspect\MethodInvocation;
use Ding\Logger\ILoggerAware;

/**
 * Aspect
 */
class DoctrineTransactionManager implements ILoggerAware
{
    /**
     * Resource
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $entityManager;
    protected static $count = 0;
    protected $logger;

    public function setLogger(\Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * MethodInterceptor(class-expression="AbstractService",expression=".*")
     */
    public function manageTransaction(MethodInvocation $methodInvocation)
    {
        $method = $methodInvocation->getMethod();
        $class = $methodInvocation->getClass();
        if ((strncmp($method, '_', 1) === 0) || (strncmp($method, 'set', 3) === 0)) {
            return $methodInvocation->proceed();
        }
        $this->logger->debug("Serving for: $class::$method");
        self::$count++;
        try
        {
            if (self::$count === 1) {
                $this->logger->debug('Beginning transaction');
                $this->entityManager->beginTransaction();
            }
            $result = $methodInvocation->proceed();
            if (self::$count === 1) {
                $this->logger->debug('Commiting transaction');
                $this->entityManager->flush();
                $this->entityManager->commit();
            }
            self::$count--;
            return $result;
        } catch(\Exception $exception) {
            if (self::$count === 1) {
                $this->logger->error(
                    'Exception: '
                    . $exception->getMessage()
                    . ' occurred, rollbacking transaction'
                );
                $this->entityManager->rollback();
            }
            self::$count--;
            throw $exception;
        }
    }
}
