<?php

namespace App;

use App\EventChannel\EventChannel;
use App\News\NewsPublisher;
use App\Subscriber\Subscriber;

require __DIR__ . '/vendor/autoload.php';

$eventChannel = new EventChannel();

$sandoraJuice = new NewsPublisher('Sandora Juice', $eventChannel);
echo '<pre>';
var_dump($sandoraJuice);
echo '</pre>';
$richJuice = new NewsPublisher('Rich Juice', $eventChannel);
$wellDoneJuice = new NewsPublisher('Well Done Juice', $eventChannel);

$axelSubscriber = new Subscriber('Axel');
echo '<pre>';
var_dump($axelSubscriber);
echo '</pre>';
$alexSubscriber = new Subscriber('Alex');
$ronSubscriber = new Subscriber('Ron');

echo $eventChannel->subscribe('Sandora Juice', $axelSubscriber) . "<br>";

echo '<pre>';
var_dump($eventChannel);
echo '</pre>';
echo $eventChannel->subscribe('Rich Juice', $alexSubscriber) . "<br>";
echo $eventChannel->subscribe('Well Done Juice', $ronSubscriber) . "<br>";
echo "<br>";
echo $sandoraJuice->publish('We have new Orange Juice') . "<br>";
echo $richJuice->publish('We have new Apple Juice') . "<br>";
echo $wellDoneJuice->publish('We have new Coconut Juice') . "<br>";