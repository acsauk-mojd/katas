<?php

namespace ApplicationTest\Controller;

use Application\Controller\HelloController;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Application\Model\HelloTable;
use Zend\ServiceManager\ServiceManager;

class HelloControllerTest extends AbstractHttpControllerTestCase
{
    //protected $traceError = false;
    protected $helloTable;

    protected function configureServiceManager(ServiceManager $services)
    {
        $services->setAllowOverride(true);

        $services->setService('config', $this->updateConfig($services->get('config')));
        $services->setService(HelloTable::class, $this->mockHelloTable()->reveal());

        $services->setAllowOverride(false);
    }

    protected function updateConfig($config)
    {
        $config['db'] = [];
        return $config;
    }

    protected function mockHelloTable()
    {
        $this->helloTable = $this->prophesize(HelloTable::class);
        return $this->helloTable;
    }

    public function setUp() : void
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();

        $this->configureServiceManager($this->getApplicationServiceLocator());
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->helloTable->fetchAll()->willReturn([]);

        $this->dispatch('/hello');
        $this->assertResponseStatusCode(200);
        $this->assertQueryContentContains('h1','Greetings!');
    }

    /** @test */
    public function blogPostHasComments()
    {
        $this->dispatch('/blog/posts/my_post');

        $this->assertControllerName('blog');
        $this->assertResponseStatusCode(200);
        $this->assertQuery('section.blog-post>.comments>.comment');

    }

}