# Laravel Repository [TheRepository]
This laravel repository provides some common functions and/or functionality that almost every project needed.

## Requirements:
- Laravel 5.6+
- PHP 7+

## Installation
To get started, install TheRepository via composer:
```bash
composer require thenandan/therepository
```

## Helper Methods
##### To apply condition -
- condition($column, $operator = null, $value = null)
- orCondition($column, $operator = null, $value = null)
- conditionIn($column, array $values)
- orConditionIn($column, array $values)
- conditionNotIn($column, array $values)
- orConditionNotIn($column, array $values)
- conditionBetween($column, array $values)
- conditionNotBetween($column, array $values)
- orConditionBetween($column, array $values)
- orConditionNotBetween($column, array $values)
- hasRelation($relation, Closure $callback = null)
- orHasRelation($relation, Closure $callback = null)
- hasNoRelation($relation, Closure $callback = null)
- orHasNoRelation($relation, Closure $callback = null)
- callback(Closure $closure)
- orderBy($column, $order = Order::ASC)

##### To Create/Update/Delete
- create(array $columns)
- createMultiple(array $columns)
- update(array $conditions, array $columns)
- updateOrCreate(array $conditions, array $columns)
- delete()

##### To fetch the data
- ``fetchOne(array $columns = ['*'])`` - Works as ``first`` method in Laravel
- ``fetch(array $columns = ['*'])``  - Works as ``get`` method in Laravel
- ``fetchById($id, array $columns = ['*'])``  Works as ``find`` method in Laravel
- ``fetchByKey(string $key, string $value, array $columns = ['*'])`` - Returns collection
- ``latest($column = null)`` - Works as ``latest`` method in Laravel
- ``oldest($column = null)`` - Works as ``oldest`` method in Laravel

### Note
There is more feature and method to come so please keep looking.
