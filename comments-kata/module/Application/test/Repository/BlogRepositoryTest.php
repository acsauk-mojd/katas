<?php

namespace ApplicationTest\Controller;

use Application\Model\Blog;
use Application\Model\BlogTable;
use Application\Repository\BlogRepository;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophecy\ObjectProphecy;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractControllerTestCase;

class BlogRepositoryTest extends AbstractControllerTestCase
{
    //protected $traceError = false;
    /** @var BlogTable & ObjectProphecy */
    protected $blogTable;

    protected function configureServiceManager(ServiceManager $services)
    {
        $services->setAllowOverride(true);

        $services->setService('config', $this->updateConfig($services->get('config')));
        $services->setService(BlogTable::class, $this->mockBlogTable()->reveal());

        $services->setAllowOverride(false);
    }

    protected function updateConfig($config)
    {
        $config['db'] = [];
        return $config;
    }

    /**
     * @return BlogTable&ObjectProphecy
     */
    protected function mockBlogTable()
    {
        $this->blogTable = $this->prophesize(BlogTable::class);
        return $this->blogTable;
    }

    public function setUp(): void
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

    /** @test */
    public function getBlogs()
    {
        //create blogs
        $this->blogTable->getAllBlogs()->willReturn([new Blog(), new Blog()]);
        //get blogs from DB
        $repository = new BlogRepository($this->blogTable->reveal());
        $blogPost = $repository->getAllBlogs();
        //assert we have blogs
        self::assertEquals(2, count($blogPost));
    }

}