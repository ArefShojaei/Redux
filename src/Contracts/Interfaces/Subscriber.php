<?php

namespace Redux\Contracts\Interfaces;


interface Subscriber {
    public function subscribe(callable $subscriber): callable;
}