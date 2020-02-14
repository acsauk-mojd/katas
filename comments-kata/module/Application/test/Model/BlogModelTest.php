<?php

namespace ApplicationTest\Model;

use Application\Model\Blog;
use Application\Model\Comment;
use PHPUnit\Framework\TestCase;
use DateTime;

class BlogModelTest extends TestCase
{

    /**
     * @var Blog
     */
    private $blog;
    /**
     * @var array
     */
    private $comments;

    public function setUp(): void
    {
        $this->blog = new Blog();
        $this->comment = new Comment();
        $this->comments = [new Comment(), new Comment()];
        $this->blog->setComments($this->comments);
        $this->comment->setTimeStamp(new DateTime('now'));
    }

    /** @test */
    public function getComments()
    {
        self::assertIsArray($this->blog->getComments());
        self::assertEquals(new Comment(), $this->blog->getComments()[0]);
        self::assertEquals($this->comments, $this->blog->getComments());
    }

    /** @test */
    public function setComments()
    {
        self::assertEquals($this->comments, $this->blog->getComments());
    }

}