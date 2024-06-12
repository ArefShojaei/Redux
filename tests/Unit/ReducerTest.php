<?php

/**
 * @package
 */
use PHPUnit\Framework\TestCase;
use Redux\Reducer;
use Redux\Contracts\Interfaces\Reducer as ReducerContract;


/**
 * Reducer Test
 */
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
     */
    public function validateReducerImplementsReducerInterface($reducer) {
        $this->assertInstanceOf(ReducerContract::class, $reducer);
    }
}