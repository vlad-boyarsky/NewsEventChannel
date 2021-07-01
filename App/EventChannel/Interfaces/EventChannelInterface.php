<?php

namespace App\EventChannel\Interfaces;

interface EventChannelInterface
{
    public function publish();

    public function subscribe();
}