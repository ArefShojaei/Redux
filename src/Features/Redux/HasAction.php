<?php declare(strict_types=1);

/**
 * @namespace
 */
namespace Redux\Features\Redux;


/**
 * @package
 */
use Redux\Action;
use Redux\Contracts\Interfaces\Action as ActionContract;



/**
 * Has Action feature
 * @tarit
 */
trait HasAction {
    /**
     * Create Action
     * @method createAction
     * @public
     * @static
     * @param string $type Action type
     * @return ActionContract
     */
    public static function createAction(string $type): ActionContract {
        return new Action($type);
    }
}