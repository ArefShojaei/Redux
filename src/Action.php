<?php

/**
 * @namespace
 */
namespace Redux;

/**
 * @package
 */
use Redux\Contracts\Interfaces\Action as ActionContract;


/**
 * Action creator
 * @class
 */
class Action implements ActionContract {
    /**
     * Action type
     * @prop
     * @private
     * @type string
     */
    private string $type;

    /**
     * Action payload
     * @prop
     * @private
     * @type mixed
     */
    private mixed $payload;
    

    /**
     * Constructor
     * @param string $type
     */
    public function __construct(string $type) {
        $this->type = $type;
    }

    /**
     * Set payload data
     * @method setPayload
     * @private
     * @param mixed $data
     * @return void
     */
    private function setPayload(mixed $data): void {
        $this->payload = $data;
    }

    /**
     * Call Action as function to set payload & get Action info
     * @method __invoke
     * @public
     * @param mixed $data payload data
     * @return array
     */
    public function __invoke(mixed $data): array {
        # Set payload data
        $this->setPayload($data);

        # Action info
        return [
            "type" => $this->type,
            "payload" => $this->payload
        ];
    }
}