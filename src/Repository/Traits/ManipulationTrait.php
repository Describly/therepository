<?php

namespace IamKeshariNandan\TheRepository\Repository\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Trait ManipulationTrait
 *
 * @package TheNandan\TheRepository\Traits
 */
trait ManipulationTrait
{
    use RequestMapperTrait;

    /**
     * @param array $columns
     * @param boolean $mappingRequired
     * @return mixed
     * @throws \Exception
     */
    public function create(array $columns, $mappingRequired = true)
    {
        if ($mappingRequired) {
            $columns = $this->mapIntoArray($columns);
        }
        return $this->getModel()->create($columns);
    }

    /**
     * @param array $columns
     * @param bool $mappingRequired
     * @return mixed
     * @throws \Exception
     */
    public function createMultiple(array $columns, $mappingRequired = true)
    {
        if ($mappingRequired) {
            $rows = [];
            foreach ($columns as $row) {
                $rows = $this->mapIntoArray($row);
            }
            $columns = $rows;
        }
        return $this->getModel()->insert($columns);
    }

    /**
     * @param array $conditions
     * @param array $columns
     *
     * @param bool $mappingRequired
     * @return bool
     * @throws \Exception
     */
    public function update(array $conditions, array $columns, $mappingRequired = true)
    {
        if ($mappingRequired) {
            $columns = $this->mapIntoArray($columns);
        }
        return $this->getModel()->where($conditions)->update($columns);
    }

    /**
     * @param array $conditions
     * @param array $columns
     * @return mixed
     * @throws \Exception
     */
    public function updateOrCreate(array $conditions, array $columns)
    {
        return $this->getModel()->updateOrCreate($conditions, $columns);
    }

    /**
     * @param null $id
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if (null === $id) {
            return $this->getQueryBuilder()->delete();
        }
         return $this->getQueryBuilder()->where('id', $id)->delete();
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
