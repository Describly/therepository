<?php

namespace TheNandan\TheRepository\Repository;

use Illuminate\Database\Eloquent\Model;
use TheNandan\TheRepository\Contracts\TheManipulationContract;

/**
 * Class TheRepository
 *
 * @package TheNandan\TheRepository\Repository
 */
abstract class TheRepository implements TheManipulationContract
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
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
        $this->queryBuilder = $model->newQuery();
    }

    /**
     * @return mixed
     */
    public function getQueryBuilder()
    {
        $builder = $this->queryBuilder;
        if ($builder instanceof Model) {
            return $builder->newQuery();
        }
        return $builder;
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
     *
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
}
