<?php

namespace TheNandan\TheRepository\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Closure;

/**
 * Class TheRepository
 *
 * @package TheNandan\TheRepository\Repository
 */
abstract class BaseRepository
{
    /**
     * @var Builder
     */
    private $queryBuilder;

    /**
     * @var $model
     */
    private $model;

    /**
     * TheRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->setQueryBuilder($model);
    }

    /**
     * @return mixed
     */
    public function getQueryBuilder(): Builder
    {
        return $this->queryBuilder;
    }

    /**
     * @param $queryBuilder
     *
     * @return mixed
     */
    public function setQueryBuilder($queryBuilder)
    {
        return $this->queryBuilder = $queryBuilder;
    }

    /**
     * @param Model $model
     *
     * @return $this
     */
    protected function setModel(Model $model): self
    {
        $this->model = $model;
        return $this;
    }

    /**
     * This method reset the query builder
     *
     * @return void
     */
    private function resetQueryBuilder(): void
    {
        $this->setQueryBuilder($this->getModel());
    }

    /**
     * @return mixed
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /****************************** Conditional Methods ***************************/

//    /**
//     * @param $name
//     * @param $arguments
//     *
//     * @return mixed
//     */
//    public function __call($name, $arguments)
//    {
//        return call_user_func_array([$this->getQueryBuilder(), $name], $arguments);
//    }

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

}
