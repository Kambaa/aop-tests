<?php


namespace AOPTESTS;


use Go\Aop\Intercept\MethodInvocation;
use Go\Aop\Aspect;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation as Pointcut;


class MonitorAspect implements Aspect
{
    /**
     * Method that will be called before real method
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("execution(public AOPTESTS\Example->*(*))")
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
        "<br>\n";
    }

    /**
     * Before class instance initialization.
     *
     * @Pointcut\Before("initialization(AOPTESTS\Example)")
     */
    public function beforeInstanceInitialization()
    {
        echo 'It invokes before class instance is initialized.'."\n\n\n";
    }
}