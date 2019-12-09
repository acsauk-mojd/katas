<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

class Module
{
    const VERSION = '3.1.4dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\HelloController::class => function($container) {
                    return new Controller\HelloController(
                        $container->get(Model\HelloTable::class)
                    );
                },
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\HelloTable::class => function($container) {
                    $tableGateway = $container->get(Model\HelloTableGateway::class);
                    return new Model\HelloTable($tableGateway);
                },
                Model\HelloTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Hello());
                    return new TableGateway('hello', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
}
