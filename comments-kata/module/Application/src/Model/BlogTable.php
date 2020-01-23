<?php

namespace Application\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class BlogTable
{

    public function __construct()
    {
    }

    public function getAllBlogs()
    {
//       return $this->tableGateway->get();
    }
}