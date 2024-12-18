<?php

namespace Redux\Contracts\Interfaces;


interface Dispatcher {
    public function dispatch(array $action): void;
}