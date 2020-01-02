<?php

namespace TheNandan\TheRepository\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use TheNandan\TheRepository\Contracts\TheManipulationContract;
use TheNandan\TheRepository\Contracts\TheQueryContract;

/**
 * Class TheRepository
 *
 * @package TheNandan\TheRepository\Repository
 */
abstract class BaseRepository implements TheManipulationContract, TheQueryContract
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
     * This method reset the query builder
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
     * @inheritDoc
     */
    public function all($columns = ['*']): Collection
    {
        $result = $this->getQueryBuilder()->get($columns);
        $this->resetQueryBuilder();
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function first($columns = ['*']): ?Model
    {
        $result = $this->getQueryBuilder()->first($columns);
        $this->resetQueryBuilder();
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = 20, $columns = ['*'])
    {
        $result = $this->getQueryBuilder()->paginate($perPage, $columns);
        $this->resetQueryBuilder();
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function getById($id, $columns = ['*']): ?Model
    {
        $result = $this->getQueryBuilder()->where('id', $id)->first($columns);
        $this->resetQueryBuilder();
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function findByKey($key, $value, $columns = ['*']): ?Model
    {
        $result = $this->getQueryBuilder()->where($key, $value)->first($columns);
        $this->resetQueryBuilder();
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function findWhere(array $conditions = [], $columns = ['*']): Collection
    {
        $result = $this->getQueryBuilder()->where($conditions)->get($columns);
        $this->resetQueryBuilder();
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function findWhereIn($key, array $values = [], $columns = ['*'])
    {
        $result = $this->getQueryBuilder()->whereIn($key, $values)->get($columns);
        $this->resetQueryBuilder();
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function findWhereNotIn($key, array $values = [], $columns = ['*'])
    {
        $result = $this->getQueryBuilder()->whereIn($key, $values)->get($columns);
        $this->resetQueryBuilder();
        return $result;
    }
}
