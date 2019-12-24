<?php

namespace TheNandan\TheRepository\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface TheDefinitionContract used to define the database schema
 *
 * @package TheNandan\TheRepository\Contracts
 */
interface TheDefinitionContract
{
    /**
     * Truncate command will remove all the row from table permanently
     *
     * @param Model $model
     *
     * @return mixed
     */
    public function truncate(Model $model);
}
