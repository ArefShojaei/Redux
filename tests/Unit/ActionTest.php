<?php

/**
 * @package
 */
use PHPUnit\Framework\TestCase;
use Redux\Action;
use Redux\Contracts\Interfaces\Action as ActionContract;



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
        $action = new Action(self::INIT_ACTION);
        $actual = $action();


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
        $action = new Action(self::INIT_ACTION);
        $actual = $action($payload);


        # Assert
        $this->assertEquals($expected, $actual);        
    }

    /**
     * @test
     */
    public function validateActionTypeShouldBeString() {
        # Arrange
        
        # Act
        $action = new Action(self::INIT_ACTION);
        $actual = $action();


        # Assert
        $this->assertIsString($actual['type']); 
    }

    /**
     * @test
     */
    public function validateActionPayloadShouldBeNull() {
        # Arrange
        
        # Act
        $action = new Action(self::INIT_ACTION);
        $actual = $action();


        # Assert
        $this->assertNull($actual['payload']);
    }

    /**
     * @test
     */
    public function validateCreatedActionReturnsAnArray() {
        # Arrange
        
        # Act
        $action = new Action(self::INIT_ACTION);
        $actual = $action();


        # Assert
        $this->assertIsArray($actual);     
    }

    /**
     * @test
     */
    public function validateActionImplementsActionInterface() {
        # Arrange

        # Act
        $action = new Action(self::INIT_ACTION);
    
        # Assert
        $this->assertInstanceOf(ActionContract::class, $action);
    }
}