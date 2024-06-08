![Poster](https://github.com/ArefShojaei/Redux/assets/134844185/e70752be-ba62-4d87-8741-1f5973343281)

<h1 align='center'>Redux - State Manger</h1>

```php
<?php

use Redux\Redux;


# Action
$incrementAction = Redux::createAction("INCREMENT");


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

# Installation
Using Composer
```bash
composer require arefshojaei/redux
```

Using Git
```bash
git clone https://github.com/ArefShojaei/Redux.git
```

# Guide
> **Store** : State or Container as Global data

```php
# Usage
Redux::createStore($reducer, $middlewares);
```

> **Action** : An Event to do something

```php
# Usage
Redux::createAction("ACTION");
```

> **Reducer** : A Function to call by Action

```php
# Usage
Redux::createReducer($initState, $reducers);
```

> **Middleware** : A Function to call before Reducer for doing something

```php
# Usage
Redux::createMiddleware($callback);
```

> **CombineReducers** : Combine all reducers to get as Array with key & value

```php
# Usage
Redux::combineReducers($reducers);
```


# An Example of Counter App
> Create Action to
* Increment count
* Decrement count
* Reset count

```php
# Actions
$incrementAction = Redux::createAction("INCREMENT");

$decrementAction = Redux::createAction("DECREMENT");

$resetAction = Redux::createAction("RESET");
```