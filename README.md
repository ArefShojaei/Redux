![Poster](https://github.com/ArefShojaei/Redux/assets/134844185/e70752be-ba62-4d87-8741-1f5973343281)

<h1 align='center'>Redux - State Manger</h1>

```php
<?php

use Redux\Redux;


# Action
$incrementAction = Redux::createAction("INCREMENT");

// [
//     "type" => "INCREMENT",
//     "payload" => null
// ]



# Reducer
$counterReducer = Redux::createReducer(0, [
    $incrementAction()["type"] => fn($state, $action) => $state + 1
]);


# Store
$store = Redux::createStore($counterReducer);

echo $store->getState(); # 0

$store->dispatch($incrementAction());

echo $store->getState(); # 1
```