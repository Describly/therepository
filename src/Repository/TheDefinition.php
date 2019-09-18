<?php

namespace TheNandan\TheRepository\Repository;

use TheNandan\TheRepository\Contracts\TheDefinitionContract;

/**
 * Class TheRepository
 *
 * @package TheNandan\TheRepository\Repository
 */
class TheDefinition implements TheDefinitionContract
{

    /**
     * This method returns the collection of the result
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
     * This method return the instance of the model object
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
