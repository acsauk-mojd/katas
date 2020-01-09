<?php declare

(strict_types=1);

namespace Application\Controller;

use http\Client\Response;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractRestfulController
{
    public function getBlogAction()
    {
        $view = new ViewModel();
        $view->setTemplate('application/blog/blog');
        return $view;
    }
}