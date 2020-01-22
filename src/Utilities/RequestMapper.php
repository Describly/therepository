<?php

namespace TheNandan\TheRepository\Utilities;

use Illuminate\Contracts\Container\BindingResolutionException;
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
     *
     * @throws \Exception
     */
    public static function mapIntoArray(array $request, $model): array
    {
        if (!($model instanceof Model)) {
            try {
                $model = app()->make($model);
            } catch (\Exception $e) {
                throw new \Exception('Given class ['.$model.'] is not a Laravel model or is not instantiable.');
            }
        }


    }
}
