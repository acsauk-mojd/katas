<?php

namespace ApplicationTest\Model;

use Application\Model\Blog;
use PHPUnit\Framework\TestCase;

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
        $this->comments = [new Comment(), new Comment()];
        $this->blog->setComments($this->comments);
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

//    /** @test */
//    public function commentsHasDateStamp()
//    {
//       $timeStamp = $this->blog->getComments()->setTimeStamp('01/01/20 18:00:00');
//        self::assertEquals(new \DateTime(), $timeStamp);
//    }
}