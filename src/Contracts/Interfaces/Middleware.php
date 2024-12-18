<?php

namespace Redux\Contracts\Interfaces;


use Redux\Contracts\Interfaces\Store;


interface Middleware {
    public function apply(Store $store, array $action): void;
}