<?php

namespace App\EventChannel;

use App\EventChannel\Interfaces\EventChannelInterface;
use App\Subscriber\Interfaces\SubscriberInterface;

class EventChannel implements EventChannelInterface
{

    private array $news = [];

    public function publish(string $news, string $text): void
    {
        foreach ($this->news[$news] as $subscriberNews) {
            $subscriberNews->notify($text);
        }
    }

    public function subscribe(string $news, SubscriberInterface $subscriber)
    {
        $this->news[$news][] = $subscriber;

        $info = $subscriber->getName() . " subscribe on " . "'" . $news . "'" . " [" . date('Y-m-d H:i:s') . "]";

        echo $info;
    }
}