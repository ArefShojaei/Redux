<?php

/**
 * @package
 */
use PHPUnit\Framework\TestCase;
use Redux\Action;
use Redux\Reducer;
use Redux\Store;



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
    }
}