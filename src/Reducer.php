<?php declare(strict_types=1);

namespace Redux;


use Redux\Contracts\Interfaces\Reducer as ReducerContract;


final class Reducer implements ReducerContract {
    private mixed $state;

    private array $reducers;

    
    public function __construct(mixed $initState, array $reducers) {
        $this->state = $initState;
        $this->reducers = $reducers;
    }

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