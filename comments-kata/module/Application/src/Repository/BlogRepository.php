<?php


namespace Application\Repository;

use Application\Model\Blog;
use Application\Model\BlogTable;
use phpDocumentor\Reflection\Types\Void_;

class BlogRepository
{

    /**
     * @var BlogTable
     */
    private $blogTable;

    public function __construct(BlogTable $blogTable)
    {
        $this->blogTable = $blogTable;
    }

    public function getAllBlogs() :array
    {
        return $this->blogTable->getAllBlogs();
    }

    public function getLatest() :array
    {
        return $this->blogTable->getLatest();
    }
}