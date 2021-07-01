<?php

namespace App\EventChannel\Interfaces;

use App\Subscriber\Interfaces\SubscriberInterface;

interface EventChannelInterface
{
    public function publish(string $news, string $text): void;

    public function subscribe(string $news, SubscriberInterface $subscriber);
}