<?php

namespace App;

use App\EventChannel\EventChannel;
use App\News\NewsPublisher;
use App\Subscriber\Subscriber;

require __DIR__ . '/vendor/autoload.php';

$eventChannel = new EventChannel();

$timesNews = new NewsPublisher('Times News', $eventChannel);
$newNews = new NewsPublisher('New News', $eventChannel);
$oktoNews = new NewsPublisher('Okto news', $eventChannel);

$aslanSubscriber = new Subscriber('Aslan');
$alexSubscriber = new Subscriber('Alex');
$ronSubscriber = new Subscriber('Ron');

echo $eventChannel->subscribe('Times News', $aslanSubscriber) . "<br>";
echo $eventChannel->subscribe('New News', $alexSubscriber) . "<br>";
echo $eventChannel->subscribe('Okto news', $ronSubscriber) . "<br>";
echo "<br>";
echo $timesNews->publish('New "Times News"') . "<br>";
echo $newNews->publish('New "New News"') . "<br>";
echo $oktoNews->publish('New "Okto News"') . "<br>";