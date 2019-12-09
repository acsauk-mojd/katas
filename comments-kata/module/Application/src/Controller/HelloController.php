<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;

class HelloController extends AbstractRestfulController
{
    /**
     * @var HelloTable
     */
    private $table;

    /**
     * HelloController constructor.
     * @param HelloTable $table
     */
    public function __construct(HelloTable $table)
    {
        $this->table = $table;
    }

    public function helloAction()
    {
        $message = $this->params()->fromQuery('message', 'foo');
        return new ViewModel(['message' => $message]);
    }
}
