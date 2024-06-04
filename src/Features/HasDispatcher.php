<?php

/**
 * @namespace
 */
namespace Redux\Features;


/**
 * @package
 */
use Redux\Middleware;



/**
 * Has Dispatcher feature for Store
 * @tarit
 */
trait HasDispatcher {
    /**
     * Dispatch reducer by Action
     * @method dispatch
     * @public
     * @param array $action
     * @return void
     */
    public function dispatch(array $action): void {
        # Apply Middlewares
        if(count($this->middlewares)) {
            $middleware = new Middleware($this->middlewares);
            $middleware->apply($this, $action);
        }

        # Get Reducer
        $reducer = $this->reducer;
        
        # Run the Reducer
        $this->state = $reducer($this->state, $action);

        # Run all Subscribers
        foreach ($this->subscribers as $subscriber) {
            $subscriber($this);
        }
    }
}