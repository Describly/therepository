<?php

namespace TheNandan\TheRepository\Repository;

use TheNandan\TheRepository\Contracts\TheManipulationContract;

/**
 * Class TheRepository
 *
 * @package TheNandan\TheRepository\Repository
 */
class TheRepository implements TheManipulationContract
{
    /**
     * Returns the collection of objects
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function get($columns = ['*'])
    {
        // TODO: Implement get() method.
    }

    /**
     * Returns the object
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function first($columns = ['*'])
    {
        // TODO: Implement first() method.
    }
}
