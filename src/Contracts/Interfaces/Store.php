<?php

namespace Redux\Contracts\Interfaces;


use Redux\Contracts\Interfaces\Dispatcher;


interface Store extends Dispatcher, Subscriber {
    public function getState(): mixed;
}