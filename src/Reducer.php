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
     * State
     * @prop
     * @private
     * @type mixed
     */
    private mixed $state;

    /**
     * List of Reducers
     * @prop
     * @private
     * @type array
     */
    private array $reducers;

    

    /**
     * Constructor
     * @param mixed $initState
     * @param array $reducers
     */
    public function __construct(mixed $initState, array $reducers) {
        $this->state = $initState;
        $this->reducers = $reducers;
    }

    /**
     * Get Reducer as function
     * @method getReducer
     * @public
     * @return callable
     */
    public function getReducer(): callable {
        return function($state, $action) {
            # Action Type
            $type = $action["type"];

            # Check to exist Reducer
            $reducer = $this->reducers[$type] ?? false;
            
            # Get State
            if(!$reducer) return $this->state;
            
            # Update State
            $this->state = $reducer($this->state, $action);

            return $this->state;
        };
    }
    
    /**
     * Combine Reducers
     * @method combineReducers
     * @public
     * @static
     * @return callable
     */
    public static function combineReducers(array $reducers): callable {
        return function($state, $action) use ($reducers) {
            # New State
            $result = [];

            # Add State
            foreach ($reducers as $key => $reducer) {
                $result[$key] = $reducer($state, $action);
            }

            # Get the State
            return $result;
        };
    }
}