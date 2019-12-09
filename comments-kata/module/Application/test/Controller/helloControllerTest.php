<?php

namespace ApplicationTest\Controller;

use Application\Controller\HelloController;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class HelloControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = false;

    public function setUp() : void
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
        // Grabbing the full application configuration:
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));
        parent::setUp();

//        $services = $this->getApplicationServiceLocator();
//        $config = $services->get('config');
//        unset($config['db']);
//        $services->setAllowOverride(true);
//        $services->setService('config', $config);
//        $services->setAllowOverride(false);
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/hello');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Application');
        $this->assertControllerName(HelloController::class);
        $this->assertControllerClass('HelloController');
        $this->assertMatchedRouteName('world');
    }

}