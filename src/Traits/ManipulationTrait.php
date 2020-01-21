<?php

namespace TheNandan\TheRepository\Traits;

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
}
