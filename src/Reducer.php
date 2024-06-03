<?php

/**
 * @namespace
 */
namespace Redux;


/**
 * @package
 */
use Redux\Contracts\Interfaces\Reducer as ReducerContract;



/**
 * Reducer creator
 * @class
 */
class Reducer implements ReducerContract {
    /**
     * List of Reducers
     * @prop
     * @private
     * @type array
     */
    private array $reducers;

    
    /**
     * Constructor
     * @param array $reducers
     */
    public function __construct(array $reducers) {
        $this->reducers = $reducers;
    }

    /**
     * Get Reducer as function
     * @method getReducer
     * @public
     * @return callable
     */
    public function getReducer(): callable {
        return function($state, $aciton) {
            # Action Type
            $type = $aciton["type"];

            # Check to exist Reducer
            $reducer = $this->reducers[$type] ?? false;
            
            # Get Reducer
            return !$reducer ? $state : $reducer($state, $aciton);
        };
    }
}