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
     * @param array $action
     * @public
     * @return void
     */
    public function dispatch(array $action): void {
        # Get reducer
        $reducer = $this->reducer;

        $this->state = $reducer($this->state, $action);
    }
}