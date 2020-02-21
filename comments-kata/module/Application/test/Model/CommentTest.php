<?php

namespace ApplicationTest\Model;

use Application\Model\Comment;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{

    /**
     * @var Comment
     */
    private $comment;

    public function setUp(): void
    {
        $this->comment = new Comment();
        $this->comment->setTimeStamp(new DateTime('2020-01-01'));
    }

    /** @test */
    public function commentHasDateStamp()
    {
        $timeStamp = $this->comment->getTimeStamp();
        self::assertEquals(new DateTime('2020-01-01'), $timeStamp);
    }
}
