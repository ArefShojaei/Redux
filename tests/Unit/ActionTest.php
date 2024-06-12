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
        $action = new Action(self::INIT_ACTION);
        
        # Act
        $actual = $action();


        # Assert
        $this->assertEquals(self::DEFAULT_PAYLOAD, $actual);

        return $action;
    }

    /**
     * @test
     */
    public function createActionWithPayload() {
        # Arrange
        $payload = ["status" => "OK"];
        
        $action = new Action(self::INIT_ACTION);
        
        $expected = [
            "type" => self::INIT_ACTION,
            "payload" => $payload
        ];
        

        # Act
        $actual = $action($payload);


        # Assert
        $this->assertEquals($expected, $actual);      
    }

    /**
     * @test
     * @depends createAction
     */
    public function validateActionTypeShouldBeString($action) {
        $this->assertIsString($action['type']); 
    }

    /**
     * @test
     * @depends createAction
     */
    public function validateActionPayloadShouldBeNull($action) {
        $this->assertNull($action['payload']);
    }

    /**
     * @test
     * @depends createAction
     */
    public function validateCreatedActionReturnsAnArray($action) {
        $this->assertIsArray($action);     
    }

    /**
     * @test
     * @depends createAction
     */
    public function validateActionImplementsActionInterface($action) {
        $this->assertInstanceOf(ActionContract::class, $action);
    }
}