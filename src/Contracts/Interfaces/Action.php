<?php

namespace Redux\Contracts\Interfaces;


interface Action {
    public function __invoke(mixed $data = null): array;
}