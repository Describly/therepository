<?php

namespace TheNandan\TheRepository\Utilities;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use TheNandan\TheRepository\Utilities\Contracts\HasRequestMapping;

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
    public static function mapIntoArray(array $request, $model, $nullAllowed = false): array
    {
        $model = self::validateModelAndGetModel($model);
        $keys = $model->mapRequest();
        $data = [];
        foreach ($keys as $k => $v) {
            if (array_key_exists($v, $request) || $model->$k !== $request[$v]) {
                $data[$k] = $request[$v];
            }
        }
        return $data;
    }

    /**
     * This method validates the given model and returns the model object if valid
     *
     * @param $model
     * @return Model
     *
     * @throws \Exception
     */
    private static function validateModelAndGetModel($model): Model
    {
        if (!($model instanceof Model)) {
            try {
                $model = app()->make($model);
            } catch (\Exception $e) {
                throw new \Exception('Given class ['.$model.'] is not a Laravel model or is not instantiable.');
            }
        }

        if (!($model instanceof Model)) {
            throw new \Exception('Given class ['.$model.'] is not a Laravel model.');
        }

        if (!method_exists($model, 'mapRequest')) {
            throw new \Exception("Model [".get_class($model)."] must impliment the [HasRequestMapping] interface.");
        }
        return $model;
    }
}
