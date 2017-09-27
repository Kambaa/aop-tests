<?php


namespace AOPTESTS\Aspect;


use Go\Aop\Intercept\MethodInvocation;
use Go\Aop\Aspect;
use Go\Lang\Annotation\Before;


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
}