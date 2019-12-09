<?php

namespace Application\Model;

class Hello
{
    public $id;
    public $message;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->message = !empty($data['message']) ? $data['message'] : null;
    }
}