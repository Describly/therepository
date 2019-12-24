<?php

namespace TheNandan\TheRepository\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface TheQueryContract used for performing queries on the data within schema objects
 *
 * @package TheNandan\TheRepository\Contracts
 */
interface TheQueryContract
{
    /**
     * This method returns all the rows from the table
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*']): Collection;

    /**
     * This method returns the first row from the table
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function first($columns = ['*']): ?Model;

    /**
     * This method returns the paginated rows from the table
     *
     * @param int $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($perPage = 20, $columns = ['*']);

    /**
     * This method return the first matching row of the given id
     *
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function getById($id, $columns = ['*']): ?Model;

    /**
     * This method return first matching row of the key value pair
     *
     * @param $key
     * @param $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findByKey($key, $value, $columns = ['*']): ?Model;

    /**
     * This method return the rows for the given condition(s)
     *
     * @param array $conditions
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere(array $conditions = [], $columns = ['*']): Collection;

    /**
     * This method return the rows if the key have matching values
     *
     * @param $key
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereIn($key, array $values = [], $columns = ['*']);

    /**
     * This method return the rows if the key does not have matching values
     *
     * @param $key
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereNotIn($key, array $values = [], $columns = ['*']);
}
