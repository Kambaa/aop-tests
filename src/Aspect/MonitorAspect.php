<?php


namespace AOPTESTS\Aspect;


use Go\Aop\Intercept\MethodInvocation;
use Go\Aop\Aspect;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\AfterThrowing;
use Go\Lang\Annotation\Around;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\Pointcut;

class MonitorAspect implements Aspect
{
    /**
     * Method that will be called before real method
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("execution(public AOPTESTS\Service\ExampleService->tst(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        $obj = $invocation->getThis();
        echo 'Calling Before Interceptor for method: ',
        is_object($obj) ? get_class($obj) : $obj,
        $invocation->getMethod()->isStatic() ? '::' : '->',
        $invocation->getMethod()->getName(),
        '()',
        ' with arguments: ',
        json_encode($invocation->getArguments()),
        PHP_EOL;
    }

    /**
     * Before class instance initialization.
     * fixme : does not work.
     * @Before("initialization(AOPTESTS\Service\**)")
     */
    public function beforeInstanceInitialization()
    {
        echo 'It invokes before class instance is initialized.' . PHP_EOL;
    }

    /**
     * @AfterThrowing("execution(public AOPTESTS\Service\ExampleService->method1(*))")
     * @param MethodInvocation $invocation
     */
    public function afterExceptions(MethodInvocation $invocation)
    {
        echo $invocation->getMethod()->getName() . " threw an exception.";
    }

    /**
     *
     * @param MethodInvocation $invocation
     * @Around("execution(public AOPTESTS\Service\ExampleService->method3(*))")
     */
    public function preventExec(MethodInvocation $invocation)
    {
        echo 'Method exec cross-cuts'.PHP_EOL;
        $invocation->proceed();
    }
}