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
     * Subscribe & UnSubscribe Store by Subscriber
     * @method subscribe
     * @public
     * @param callable $subscriber
     * @return void
     */
    public function subscribe(callable $subscriber): callable {
        # Add Subscriber
        $this->subscribers[] = $subscriber;


        # UnSubscribe all Subscribers
        return $this->unSubscribe($subscriber);
    }

    /**
     * UnSubscribe all Subscribers
     * @method unSubscribe
     * @private
     * @param callable $subscriber
     * @return callable
     */
    private function unSubscribe(callable $subscriber): callable {
        return function() use ($subscriber) {
            # Get Subscriber index
            $subscriberIndex = array_search($subscriber, $this->subscribers);

            # Self Subscriber index
            $selfSubscriberIndex = 1;

            # Pop the Subscriber from the Subscribers
            array_splice($this->subscribers, $subscriberIndex, $selfSubscriberIndex);
        };
    }
}