<?php

namespace Redux\Contracts\Interfaces;


use Redux\Contracts\Interfaces\Store;


interface Redux {
    public static function createStore(callable $reducer, array $middlewares = []): Store;
}