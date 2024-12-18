<?php declare(strict_types=1);

namespace Redux\Features\Redux;


use Redux\Action;
use Redux\Contracts\Interfaces\Action as ActionContract;


trait HasAction {
    public static function createAction(string $type): ActionContract {
        return new Action($type);
    }
}