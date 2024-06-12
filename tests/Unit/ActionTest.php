<?php

/**
 * @package
 */
use PHPUnit\Framework\TestCase;
use Redux\Action;


/**
 * Action Test
 */
class ActionTest extends TestCase {
    /**
     * @test
     */
    public function createAction() {
        # Arrange
        $incrementActionType = "@INIT";
        $expected = [
            "type" => $incrementActionType,
            "payload" => null
        ];
        
        # Act
        $incrementAction = new Action($incrementActionType);
        $actual = $incrementAction();


        # Assert
        $this->assertEquals($expected, $actual);
    }
}