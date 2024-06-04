<?php

/**
 * @namespace
 */
namespace Redux;


/**
 * @package
 */
use Redux\Contracts\Interfaces\Redux as ReduxContract;
use Redux\Features\Redux\HasAction;
use Redux\Features\Redux\HasMiddleware;
use Redux\Features\Redux\HasReducer;
use Redux\Features\Redux\HasStore;



/**
 * Redux Factory
 * @class
 */
class Redux implements ReduxContract {
    use HasStore, HasAction, HasReducer, HasMiddleware;
}