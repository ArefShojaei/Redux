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

    /**
     * @test
     */
    public function createActionWithPayload() {
        # Arrange
        $incrementActionType = "@INIT";
        $payload = ["status" => "OK"];
        $expected = [
            "type" => $incrementActionType,
            "payload" => $payload
        ];
        
        # Act
        $incrementAction = new Action($incrementActionType);
        $actual = $incrementAction($payload);


        # Assert
        $this->assertEquals($expected, $actual);        
    }

    /**
     * @test
     */
    public function validateActionTypeShouldBeString() {
        # Arrange
        $incrementActionType = "@INIT";
        
        # Act
        $incrementAction = new Action($incrementActionType);
        $actual = $incrementAction();


        # Assert
        $this->assertIsString($actual['type']);         
    }

    /**
     * @test
     */
    public function validateActionPayloadShouldBeNull() {
        # Arrange
        $incrementActionType = "@INIT";
        
        # Act
        $incrementAction = new Action($incrementActionType);
        $actual = $incrementAction();


        # Assert
        $this->assertNull($actual['payload']);
    }

    /**
     * @test
     */
    public function validateCreatedActionReturnsAnArray() {
        # Arrange
        $incrementActionType = "@INIT";
        
        # Act
        $incrementAction = new Action($incrementActionType);
        $actual = $incrementAction();


        # Assert
        $this->assertIsArray($actual);     
    }
}