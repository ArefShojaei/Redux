<?php declare(strict_types=1);

namespace Redux;


use Redux\Contracts\Interfaces\Action as ActionContract;


final class Action implements ActionContract {
    private string $type;

    private mixed $payload;
    

    public function __construct(string $type) {
        $this->type = $type;
    }

    private function setPayload(mixed $data): void {
        $this->payload = $data;
    }

    /**
     * Call Action as function to set payload & get Action info
     */
    public function __invoke(mixed $data = null): array {
        # Set payload data
        $this->setPayload($data);

        # Action info
        return [
            "type" => $this->type,
            "payload" => $this->payload
        ];
    }
}