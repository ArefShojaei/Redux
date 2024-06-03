<?php

/**
 * @namespace
 */
namespace Redux\Features;


/**
 * Has Subscriber feature for Store
 * @tarit
 */
trait HasSubscriber {
    /**
     * Subscribe & UnSubscribe Store by Listener
     * @method subscribe
     * @public
     * @param callable $listener
     * @return void
     */
    public function subscribe(callable $listener): callable {
        # Add Listener
        $this->listeners[] = $listener;


        # UnSubscribe Listeners
        return function() use ($listener) {
            # Get Listener index
            $listenerIndex = array_search($listener, $this->listeners);

            # Self Listener index
            $selfListenerIndex = 1;

            # Pop the Listener from the Listeners
            array_splice($this->listeners, $listenerIndex, $selfListenerIndex);
        };
    }
}