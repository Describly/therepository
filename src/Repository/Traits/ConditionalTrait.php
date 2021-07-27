<?php

namespace TheNandan\TheRepository\Repository\Traits;

use Illuminate\Support\Collection;
use Closure;
use TheNandan\TheRepository\Dictionaries\Order;

/**
 * Trait ConditionalTrait
 *
 * @package TheNandan\TheRepository\Traits
 */
trait ConditionalTrait
{
    /**
     * @param $column
     * @param null $operator
     * @param null $value
     *
     * @return $this
     */
    public function condition($column, $operator = null, $value = null)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->where($column, $operator, $value));
        return $this;
    }

    /**
     * @param $column
     * @param null $operator
     * @param null $value
     *
     * @return $this
     */
    public function orCondition($column, $operator = null, $value = null)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->where($column, $operator, $value, 'or'));
        return $this;
    }

    /**
     * @param $column
     * @param $values
     *
     * @return $this
     */
    public function conditionIn($column, array $values)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->whereIn($column, $values));
        return $this;
    }

    /**
     * @param $column
     * @param $values
     *
     * @return $this
     */
    public function orConditionIn($column, array $values)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->orWhereIn($column, $values));
        return $this;
    }

    /**
     * @param $column
     * @param $values
     *
     * @return $this
     */
    public function conditionNotIn($column, array $values)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->whereNotIn($column, $values));
        return $this;
    }

    /**
     * @param $column
     * @param $values
     *
     * @return $this
     */
    public function orConditionNotIn($column, array $values)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->orWhereNotIn($column, $values));
        return $this;
    }

    /**
     * @param $column
     * @param $values
     *
     * @return $this
     */
    public function conditionBetween($column, array $values)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->whereBetween($column, $values));
        return $this;
    }

    /**
     * @param $column
     * @param $values
     *
     * @return $this
     */
    public function conditionNotBetween($column, array $values)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->whereNotBetween($column, $values));
        return $this;
    }

    /**
     * @param $column
     * @param $values
     *
     * @return $this
     */
    public function orConditionBetween($column, array $values)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->orWhereBetween($column, $values));
        return $this;
    }

    /**
     * @param $column
     * @param $values
     *
     * @return $this
     */
    public function orConditionNotBetween($column, array $values)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->orWhereNotBetween($column, $values));
        return $this;
    }

    /**
     * @param $relation
     * @param Closure|null $callback
     *
     * @return $this
     */
    public function hasRelation($relation, Closure $callback = null)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->whereHas($relation, $callback));
        return $this;
    }

    /**
     * @param $relation
     * @param Closure|null $callback
     *
     * @return $this
     */
    public function orHasRelation($relation, Closure $callback = null)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->orWhereHas($relation, $callback));
        return $this;
    }

    /**
     * @param $relation
     * @param Closure|null $callback
     *
     * @return $this
     */
    public function hasNoRelation($relation, Closure $callback = null)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->whereDoesntHave($relation, $callback));
        return $this;
    }

    /**
     * @param $relation
     * @param Closure|null $callback
     *
     * @return $this
     */
    public function orHasNoRelation($relation, Closure $callback = null)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->orWhereDoesntHave($relation, $callback));
        return $this;
    }

    /**
     * @param Closure $closure
     *
     * @return $this
     */
    public function callback(Closure $closure)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->where($closure));
        return $this;
    }

    public function orderBy($column, $order = Order::ASC)
    {
        $this->setQueryBuilder($this->getQueryBuilder()->orderBy($column, $order));
        return $this;
    }
}
