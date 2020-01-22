<?php

namespace TheNandan\TheRepository\Utilities\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class RequestMapper
 *
 * @package TheNandan\TheRepository\Utilities
 */
class RequestMapper
{
    /**
     * This method maps the request fields with the table columns
     *
     * @param array $request
     * @param $model
     *
     * @return array
     */
    public static function mapIntoArray(array $request, $model): array
    {

    }
}
