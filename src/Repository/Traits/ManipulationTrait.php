<?php

namespace TheNandan\TheRepository\Repository\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Closure;

/**
 * Trait ManipulationTrait
 *
 * @package TheNandan\TheRepository\Traits
 */
trait ManipulationTrait
{
    /**
     * @param array $columns
     * @return mixed
     */
    public function create(array $columns)
    {
        return $this->getModel()->create($columns);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function createMultiple(array $columns)
    {
        return $this->getModel()->insert($columns);
    }

    /**
     * @param array $conditions
     * @param array $columns
     *
     * @return bool
     */
    public function update(array $conditions, array $columns)
    {
        return $this->getModel()->update($conditions, $columns);
    }

    /**
     * @param array $conditions
     * @param array $columns
     * @return mixed
     */
    public function updateOrCreate(array $conditions, array $columns)
    {
        return $this->getModel()->updateOrCreate($conditions, $columns);
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        return $this->getQueryBuilder()->delete();
    }


    /**
     * @param array $columns
     *
     * @return Builder|Model|object|null
     */
    public function fetchOne(array $columns = ['*'])
    {
        return $this->getQueryBuilder()->first($columns);
    }

    /**
     * @param array $columns
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function fetch(array $columns = ['*'])
    {
        return $this->getQueryBuilder()->get($columns);
    }

    /**
     * @param $id
     * @param array $columns
     * @return Builder|Model|object|null
     */
    public function fetchById($id, array $columns = ['*'])
    {
        return $this->getQueryBuilder()->find($id, $columns);
    }

    /**
     * @param string $key
     * @param string $value
     * @param array $columns
     * @return Builder[]|Collection
     */
    public function fetchByKey(string $key, string $value, array $columns = ['*'])
    {
        return $this->getQueryBuilder()->where($key, $value)->get($columns);
    }

    /**
     * @param null $column
     * @return mixed
     */
    public function latest($column = null)
    {
        return $this->getQueryBuilder()->latest($column);
    }

    /**
     * @param null $column
     * @return mixed
     */
    public function oldest($column = null)
    {
        return $this->getQueryBuilder()->oldest($column);
    }
}
