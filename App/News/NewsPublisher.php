<?php

namespace App\News;

use App\News\Interfaces\NewsPublisherInterface;
use App\EventChannel\Interfaces\EventChannelInterface;

class NewsPublisher implements NewsPublisherInterface
{
    private string $news;

    private EventChannelInterface $eventChannel;

    public function __construct(string $product, EventChannelInterface $shopEventChannel)
    {
        $this->news = $product;

        $this->eventChannel = $shopEventChannel;
    }

    public function publish(string $data): void
    {
        $this->eventChannel->publish($this->news, $data);
    }

}