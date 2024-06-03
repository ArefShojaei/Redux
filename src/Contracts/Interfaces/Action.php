<?php

/**
 * @namespace
 */
namespace Redux\Contracts\Interfaces;


/**
 * Action interface 
 * @interface
 */
interface Action {
    /**
     * Call Action as function to set payload & get Action info
     * @method __invoke
     * @public
     * @param mixed $data payload data
     * @return array
     */
    public function __invoke(mixed $data = null): array;
}