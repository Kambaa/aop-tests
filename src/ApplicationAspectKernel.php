<?php
/**
 * Created by PhpStorm.
 * User: yg
 * Date: 9/19/17
 * Time: 11:02 AM
 */

namespace AOPTESTS;


use Go\Core\AspectContainer;
use Go\Core\AspectKernel;

class ApplicationAspectKernel extends AspectKernel
{
    /**
     * Configure an AspectContainer with advisors, aspects and pointcuts
     *
     * @param AspectContainer $container
     *
     * @return void
     */
    protected function configureAop(AspectContainer $container)
    {
        $container->registerAspect(new MonitorAspect());
    }

}