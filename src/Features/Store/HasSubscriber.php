<?php declare(strict_types=1);

namespace Redux\Features\Store;


trait HasSubscriber {
    /**
     * Subscribe & UnSubscribe Store
     */
    public function subscribe(callable $subscriber): callable {
        # Add Subscriber
        $this->subscribers[] = $subscriber;


        # UnSubscribe all Subscribers
        return $this->unSubscribe($subscriber);
    }

    /**
     * UnSubscribe all Subscribers
     */
    private function unSubscribe(callable $subscriber): callable {
        return function() use ($subscriber) {
            # Subscriber index
            $subscriberIndex = array_search($subscriber, $this->subscribers);

            $selfSubscriberIndex = 1;

            # Delete the Subscriber from the Subscribers
            array_splice($this->subscribers, $subscriberIndex, $selfSubscriberIndex);
        };
    }
}