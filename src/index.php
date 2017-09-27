<?php
/**
 * Created by PhpStorm.
 * User: yg
 * Date: 9/19/17
 * Time: 10:57 AM
 */

// Initialize an application aspect container
use AOPTESTS\Service\ExampleService;
use AOPTESTS\Utils\ApplicationAspectKernel;

require_once '../vendor/autoload.php';

$applicationAspectKernel = ApplicationAspectKernel::getInstance();
$applicationAspectKernel->init(array(
    'debug' => true, // Use 'false' for production mode
    // Cache directory
    'cacheDir' => __DIR__ . '/../cache/', // Adjust this path if needed
    // Include paths restricts the directories where aspects should be applied, or empty for all source files
    'includePaths' => array(
        __DIR__
    )
));


$e = new ExampleService();

$x= $e->tst("xxx");

echo $x;



