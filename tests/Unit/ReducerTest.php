<?php

use PHPUnit\Framework\TestCase;
use Redux\Reducer;
use Redux\Contracts\Interfaces\Reducer as ReducerContract;


final class ReducerTest extends TestCase {
    private $initState;
    private $reducers;
    


    protected function setup(): void {
        $this->initState = 0;

        $this->reducers = [
            "INCREMENT" => fn($state, $action) => $state + 1,
            "DECREMENT" => fn($state, $action) => $state - 1,
            "RESET" => fn($state, $action) => $state - $state
        ];
    }

    /**
     * @test
     */
    public function createReducer() {
        # Arrange
        $reducer = new Reducer($this->initState, $this->reducers);

        # Act
        $actual = $reducer->getReducer();

        # Assert
        $this->assertIsCallable($actual);

        return $reducer;
    }

    /**
     * @test
     * @depends createReducer
     */
    public function validateReducerImplementsReducerInterface($reducer) {
        $this->assertInstanceOf(ReducerContract::class, $reducer);
    }

    /**
     * @test
     */
    public function validateReducerInitStateNotBeNull() {
        $this->assertNotNull($this->initState);
    }

    /**
     * @test
     */
    public function validateReducersShouldBeAnArray() {
        $this->assertIsArray($this->reducers);
    }

    /**
     * @test
     */
    public function validateReducersArrayNotBeEmpty() {
        $this->assertNotEmpty($this->reducers);
    }

    /**
     * @test
     * @depends createReducer
     */
    public function combineReducers($reducer) {
        # Arrange
        $reducers = [
            "counter" => $reducer
        ];

        # Act
        $actual = Reducer::combineReducers($reducers);
    
        # Assert
        $this->assertIsCallable($actual);
    }
}