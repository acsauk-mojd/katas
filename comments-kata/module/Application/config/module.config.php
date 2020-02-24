<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\BlogController;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'world' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/hello',
                    'defaults' => [
                        'controller' => Controller\HelloController::class,
                        'action'     => 'hello',
                    ],
                ],
            ],
            'blog' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/blog/posts/my_post',
                    'defaults' => [
                        'controller' => Controller\BlogController::class,
                        'action'     => 'getBlog',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
//            Controller\HelloController::class => InvokableFactory::class,
            Controller\HelloController::class => function($container) {
                    return new Controller\HelloController(
                        $container->get(Model\HelloTable::class)
                    );
                },
            BlogController::class => function() {
                    return new BlogController(

                    );
                },
        ],
    ],
    'view_manager' => [
        'controller_map' => [
            'Application' => true,
        ],
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
//            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/layout'      => __DIR__ . '/../view/layout/layout.html.twig',
            'application/index/index' => __DIR__ . '/../view/application/index/index.html.twig',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.html.twig',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
