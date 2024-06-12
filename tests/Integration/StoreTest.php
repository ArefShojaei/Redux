<?php

/**
 * @package
 */
use PHPUnit\Framework\TestCase;
use Redux\{
    Store,
    Reducer,
    Action
};
use Redux\Contracts\Interfaces\Store as StoreContract;



/**
 * Store Test
 */
final class StoreTest extends TestCase {
    private $reducer;
    private $action;


    protected function setup(): void {
        # Action
        $this->action = new Action("INCREMENT");
        

        # Reducer
        $initState = 0;
        $incrementAction = $this->action;

        $reducers = [
            $incrementAction()['type'] => fn($state, $aciton) => $state + 1
        ];

        $this->reducer = new Reducer($initState, $reducers);
    }


    /**
     * @test
     */
    public function createStore() {
        # Arrange
        $reducer = $this->reducer->getReducer();
        
        # Act
        $store = new Store($reducer);
    
        # Assert
        $this->assertIsObject($store);

        return $store;
    }

    /**
     * @test
     * @depends createStore
     */
    public function validateStoreImplementsStoreInterface($store) {
        $this->assertInstanceOf(StoreContract::class, $store);
    }

    /**
     * @test
     * @depends createStore
     */
    public function getStateThatShouldBeNumber($store) {
        $this->assertIsInt($store->getState());
    }

    /**
     * @test
     * @depends createStore
     */
    public function dispatchActionToUpdateState($store) {
        # Arrange
        $incrementAction = $this->action;
        $currentStateValue = $store->getState();

        # Act
        $store->dispatch($incrementAction());
        $updatedStateValue = $store->getState();


        # Assert
        $this->assertNotEquals($updatedStateValue, $currentStateValue);
    }
}