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

> **Reducer** : A Function to update state by Action

```php
# Usage
Redux::createReducer($initState, $reducers);
```

> **Middleware** : A Function to call before Reducer for doing something

```php
# Usage
Redux::createMiddleware($callback);
```
> **Apply Middlewares** : A Function to get all Middleawres and apply in Store

```php
# Usage
Redux::applyMiddlewares(...$middlewares);
```

> **Combine Reducers** : Combine all reducers to get an Array with key & value

```php
# Usage
Redux::combineReducers($reducers);
```


# An Example of Counter App
> Create Action to fire an Event 
* Increment count
* Decrement count
* Reset count

```php
$incrementAction = Redux::createAction("INCREMENT");

$decrementAction = Redux::createAction("DECREMENT");

$resetAction = Redux::createAction("RESET");
```

> Create Reducer to update State 
* Increment count
* Decrement count
* Reset count

```php
$initState = 0;

$reducer = Redux::createReducer($initState, [
    $incrementAction()["type"] => fn($state, $action) => $state + 1,
    $decrementAction()["type"] => fn($state, $action) => $state - 1,
    $resetAction()["type"] => fn($state, $action) => $state - $state,
]);
```

#### **Note** : when you calling an Action , you should know to get an Array of key & value like this
```php
# Action
$incrementAction = Redux::createAction("INCREMENT");




# call to get this details
$incrementAction()

[
    "type" => "INCREMENT",
    "payload" => null
]

# call to pass argument as payload data to get this details
$incrementAction(["status" => "OK"])

[
    "type" => "INCREMENT",
    "payload" => [
        "status" => "OK"
    ]
]
```

> Create Store by Reducer 

```php
$store = Redux::createStore($counterReducer);
```

> Use the Store in project 

```php
# Get State from the Store
echo $store->getState(); # 0


# Dispatch Action
$store->dispatch($incrementAction()); # 1
$store->dispatch($incrementAction()); # 2


# Get new State from the Store
echo $store->getState(); # 2
```

> Subscribe the Store as Logger for changing State value

```php
# Subscriber
$unSubscribe = $store->subscribe(function(\Redux\Contracts\Interfaces\Store $store) {
    echo "[Store] updated!" . PHP_EOL;
    echo "[State] value: " . $store->getState();
});



# Get State from the Store
echo $store->getState() . PHP_EOL; # 0


# Dispatch Action
$store->dispatch($incrementAction()); # 1
$store->dispatch($incrementAction()); # 2

$unSubscribe(); # Stop the Subscriber to log

$store->dispatch($incrementAction()); # 3


# Get new State from the Store
echo $store->getState(); # 3
```

> Create Middleware to log the Store & Action 

```php
# Logger
$logger = Redux::createMiddleware(function($store, $action, $next) {
    echo "- Logger Middleware -";
    echo "[State] value: " . $store->getState();
    echo "[Action] type: " . $action['type'];

    
    # Call next Middleware or Reducer
    $next($aciton);
});




# Get State from the Store
$middlewares = Redux::applyMiddleawre();


# Pass Middlewares as Argument to the Store that has defined yet
$store = Redux::createStore($counterReducer, $middlewares);
```

### Note: **Middleware vs Subscriber**
> Middleware can **log** Store, Action and  call next Middleware of Reducer by the Action!

<br>

> Subscriber can be **like Logger** to get **changing State value** from Store!
