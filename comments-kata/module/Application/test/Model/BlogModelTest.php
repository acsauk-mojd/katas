<?php

namespace ApplicationTest\Model;

use Application\Model\Blog;
use PHPUnit\Framework\TestCase;

class BlogModelTest extends TestCase
{

    public function setUp(): void
    {
        $this->blog = new Blog();
        $this->comments = ["comment 1"];
        $this->blog->setComments($this->comments);
    }

    /** @test */
    public function getComments()
    {
        self::assertIsArray($this->blog->getComments());
        self::assertEquals($this->comments, $this->blog->getComments());
    }

    /** @test */
    public function setComments()
    {
        self::assertEquals($this->blog->getComments(), $this->comments);
    }
}