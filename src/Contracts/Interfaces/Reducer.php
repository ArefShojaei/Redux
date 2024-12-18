<?php

namespace Redux\Contracts\Interfaces;


interface Reducer {
    public function getReducer(): callable;

    public static function combineReducers(array $reducers): callable;
}