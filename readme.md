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
##### Conditional
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

##### Manipulation
- create(array $columns)
- createMultiple(array $columns)
- update(array $conditions, array $columns)
- updateOrCreate(array $conditions, array $columns)
- delete()

### Note
There is more feature and method to come so please keep looking.
