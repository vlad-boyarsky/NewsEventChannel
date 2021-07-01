<?php

namespace App\Subscriber;

use App\Subscriber\Interfaces\SubscriberInterface;

class Subscriber implements SubscriberInterface
{

    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function notify($data): void
    {
        $message = $this->getName() . " notified about " . $data;

        echo $message;
    }

    public function getName(): string
    {
        return $this->name;
    }

}