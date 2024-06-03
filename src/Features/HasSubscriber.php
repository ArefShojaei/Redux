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
    public function subscribe(callable $subscriber): callable {
        # Add Listener
        $this->subscribers[] = $subscriber;


        # UnSubscribe Subscribers
        return $this->unSubscribe($subscriber);
    }

    /**
     * UnSubscribe all Subscribers
     * @method unSubscribe
     * @private
     * @param callable $listener
     * @return callable
     */
    private function unSubscribe(callable $subscriber): callable {
        return function() use ($subscriber) {
            # Get Listener index
            $subscriberIndex = array_search($subscriber, $this->subscribers);

            # Self Subscriber index
            $selfSubscriberIndex = 1;

            # Pop the Subscriber from the Subscribers
            array_splice($this->subscribers, $subscriberIndex, $selfSubscriberIndex);
        };
    }
}