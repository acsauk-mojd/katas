<?php

namespace ApplicationTest\Model;

use Application\Model\Comment;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{

    public function setUp(): void
    {
        $this->comment = new Comment();
        $this->comment->setTimeStamp(new DateTime('now'));
    }

    /** @test */
    public function commentHasDateStamp()
    {
        $timeStamp = $this->comment->getTimeStamp();
        self::assertEquals(new DateTime('now'), $timeStamp);
    }
}
