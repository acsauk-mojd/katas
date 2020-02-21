<?php

namespace ApplicationTest\Model;

use Application\Model\Blog;
use Application\Model\Comment;
use PHPUnit\Framework\TestCase;
use DateTime;
use SebastianBergmann\CodeCoverage\TestFixture\C;

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
    /**
     * @var Comment
     */
    private $comment;

    public function setUp(): void
    {
        $this->blog = new Blog();
        $this->comments = [new Comment(), new Comment()];
        $this->comments[0]->setTimeStamp(new DateTime('02-02-02'));
        $this->comments[1]->setTimeStamp(new DateTime('01-01-01'));
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
        self::assertEquals($this->comments, $this->blog->getComments());
    }

    /** @test */
    public function oldestToNewestComments()
    {
        $commentList = $this->blog->oldestToNewestComments();

        for ($i = 0; $i <= sizeof($commentList)-2; $i++) {
            self::assertTrue($commentList[$i]->getTimeStamp() < $commentList[$i+1]->getTimeStamp());
            continue;
        }
    }

    /** @test */
    public function noComments()
    {
        $commentsArray = [];

        $this->blog->setComments($commentsArray);

        self::assertEquals([], $this->blog->oldestToNewestComments());
    }

    /** @test */
    public function getUptoTen()
    {
        $commentsArray = [];

        for ($i = 0; $i <= 9; $i++)
        {
            array_push($commentsArray, new Comment());
        }

        $this->blog->setComments($commentsArray);

        self::assertEquals($commentsArray, $this->blog->oldestToNewestComments());

    }

}