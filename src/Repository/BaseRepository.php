<?php

namespace TheNandan\TheRepository\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use TheNandan\TheRepository\Repository\Traits\ConditionalTrait;
use TheNandan\TheRepository\Repository\Traits\ManipulationTrait;
use TheNandan\TheRepository\Repository\Traits\PaginationTrait;

/**
 * Class TheRepository
 *
 * @package TheNandan\TheRepository\Repository
 */
abstract class BaseRepository
{
    use ManipulationTrait, ConditionalTrait, PaginationTrait;
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
    public function getQueryBuilder()
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
}
