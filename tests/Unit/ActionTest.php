<?php

/**
 * @package
 */
use PHPUnit\Framework\TestCase;
use Redux\Action;


/**
 * Action Test
 */
final class ActionTest extends TestCase {
    private const INIT_ACTION = "@INIT";
    
    private const DEFAULT_PAYLOAD = [
        "type" => self::INIT_ACTION,
        "payload" => null
    ];


    /**
     * @test
     */
    public function createAction() {
        # Arrange
        
        # Act
        $incrementAction = new Action(self::INIT_ACTION);
        $actual = $incrementAction();


        # Assert
        $this->assertEquals(self::DEFAULT_PAYLOAD, $actual);
    }

    /**
     * @test
     */
    public function createActionWithPayload() {
        # Arrange
        $payload = ["status" => "OK"];
        $expected = [
            "type" => self::INIT_ACTION,
            "payload" => $payload
        ];
        
        # Act
        $incrementAction = new Action(self::INIT_ACTION);
        $actual = $incrementAction($payload);


        # Assert
        $this->assertEquals($expected, $actual);        
    }

    /**
     * @test
     */
    public function validateActionTypeShouldBeString() {
        # Arrange
        
        # Act
        $incrementAction = new Action(self::INIT_ACTION);
        $actual = $incrementAction();


        # Assert
        $this->assertIsString($actual['type']);         
    }

    /**
     * @test
     */
    public function validateActionPayloadShouldBeNull() {
        # Arrange
        
        # Act
        $incrementAction = new Action(self::INIT_ACTION);
        $actual = $incrementAction();


        # Assert
        $this->assertNull($actual['payload']);
    }

    /**
     * @test
     */
    public function validateCreatedActionReturnsAnArray() {
        # Arrange
        
        # Act
        $incrementAction = new Action(self::INIT_ACTION);
        $actual = $incrementAction();


        # Assert
        $this->assertIsArray($actual);     
    }
}