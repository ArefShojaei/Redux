<?php declare(strict_types=1);

namespace Redux\Features\Redux;


use Redux\Store;
use Redux\Contracts\Interfaces\Store as StoreContract;


trait HasStore {
    public static function createStore(callable $reducer, array $middlewares = []): StoreContract {
        return new Store($reducer, $middlewares);
    }
}