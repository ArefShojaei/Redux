<?php

namespace Redux;


use Redux\Contracts\Interfaces\Redux as ReduxContract;
use Redux\Features\Redux\HasAction;
use Redux\Features\Redux\HasMiddleware;
use Redux\Features\Redux\HasReducer;
use Redux\Features\Redux\HasStore;



class Redux implements ReduxContract {
    use HasStore, HasAction, HasReducer, HasMiddleware;
}