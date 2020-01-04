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
    public function where(array $conditions = [])
    {
        $this->setQueryBuilder($this->getQueryBuilder()->where($conditions));
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function whereIn($key, array $values = [])
    {
        $this->setQueryBuilder($this->getQueryBuilder()->whereIn($key, $values));
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function whereNotIn($key, array $values = [])
    {
        $this->setQueryBuilder($this->getQueryBuilder()->whereNotIn($key, $values));
        return $this;
    }
}
