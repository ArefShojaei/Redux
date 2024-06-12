<?php

/**
 * @package
 */
use PHPUnit\Framework\TestCase;
use Redux\Reducer;


/**
 * Reducer Test
 */
final class ReducerTest extends TestCase {
    private const INIT_STATE = 0;
    private const DEFAULT_REDUCERS = [];

    /**
     * @test
     */
    public function createReducer() {
        # Arrange
        
        # Act
        $reducer = new Reducer(self::INIT_STATE, self::DEFAULT_REDUCERS);

        $actual = $reducer->getReducer();
        

        # Assert
        $this->assertIsCallable($actual);
    }
}