<?php

namespace Application\Model;

class Blog
{
    /**
     * @var array
     */
    private $comments;

    public function getComments(): array
    {
        return $this->comments;
    }

    public function setComments(array $comments)
    {
        $this->comments = $comments;
    }

    public function oldestToNewestComments()
    {
        $commentList = $this->getComments();

        sort($commentList);

        return $commentList;
    }
}