<?php

namespace TheNandan\TheRepository\Repository\Traits;

use Illuminate\Database\Eloquent\Model;

trait RequestMapperTrait
{
    /**
     * This method maps the request fields with the table columns into array
     *
     * @param array $request
     * @return array
     *
     * @throws \Exception
     */
    private function mapIntoArray(array $request): array
    {
        $model = $this->validateModelAndGetModel();
        $keys = $model->mapRequestFields();
        $data = [];
        foreach ($keys as $k => $v) {
            if (array_key_exists($v, $request)) {
                $data[$k] = $request[$v];
            }
        }
        return $data;
    }

    /**
     * This method maps the request fields with the table columns into object
     *
     * @param array $request
     * @return Model
     *
     * @throws \Exception
     */
    private function mapIntoModel(array $request): Model
    {
        $model = $this->validateModelAndGetModel();
        $keys = $model->mapRequestFields();
        foreach ($keys as $k => $v) {
            if (array_key_exists($v, $request) || $model->$k !== $request[$v]) {
                $model->$k = $request[$v];
            }
        }
        return $model;
    }

    /**
     * This method validates the given model and returns the model object if valid
     *
     * @return Model
     *
     * @throws \Exception
     */
    private function validateModelAndGetModel(): Model
    {
        $model = $this->getModel();
        if (!method_exists($model, 'mapRequestFields')) {
            throw new \Exception("Model [".get_class($model)."] must implement the [TheRepositoryInterface] interface.");
        }
        return $model;
    }
}
