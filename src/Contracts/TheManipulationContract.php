<?php

namespace TheNandan\TheRepository\Contracts;

/**
 * Interface TheManipulationContract deals with the manipulation of data present in the database
 *
 * @package TheNandan\TheRepository\Contracts
 */
interface TheManipulationContract
{
    /**
     * Returns the collection of objects
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function get($columns = ['*']);

    /**
     * Returns the object
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function first($columns = ['*']);
}
