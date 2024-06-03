<?php

/**
 * @namespace
 */
namespace Redux\Features;


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