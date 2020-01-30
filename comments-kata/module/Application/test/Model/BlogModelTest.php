<?php

namespace ApplicationTest\Model;

use Application\Model\Blog;
use PHPUnit\Framework\TestCase;

class BlogModelTest extends TestCase
{
    /** @test */
    public function getComments()
    {
        $blog = new blog();
        self::assertIsArray($blog->getComments());
    }
}