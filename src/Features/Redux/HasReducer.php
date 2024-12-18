<?php declare(strict_types=1);

namespace Redux\Features\Redux;


use Redux\Reducer;


trait HasReducer {
    public static function createReducer(mixed $initState, array $reducers): callable {
        return (new Reducer($initState, $reducers))->getReducer();
    }

    public static function combineReducers(array $reducers): callable {
        return Reducer::combineReducers($reducers);
    }
}