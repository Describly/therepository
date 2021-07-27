<?php

namespace TheNandan\TheRepository\Repository\Traits;

use Illuminate\Support\Facades\DB;
use TheNandan\TheRepository\Objects\Page;

trait PaginationTrait
{
    /**
     * This method help to return the paginated record with search strings
     *
     * @param string[] $columns
     * @param bool $search
     *
     * @return mixed
     */
    public function paginate($columns = ['*'], $search = true)
    {
        $page = app(Page::class);
        $sortArray = $page->getSortBy();
        $column = 'id';
        $order = 'desc';
        if (!empty($sortArray)) {
            $column = array_key_first($sortArray);
            $order = $sortArray[$column] ?? 'desc';
        }
        $this->sortBy($column, $order);
        if ($search) {
            $this->search($page->getSearchTerm());
        }
        return $this->getQueryBuilder()->paginate($page->getPerPage(), $columns, 'page', $page->getPage());
    }

    /**
     * This method applies sorting on response
     *
     * @param $column
     * @param string $order
     *
     * @return $this
     */
    public function sortBy($column, $order = 'desc')
    {
        $model = $this->getModel();
        if (method_exists($model, 'mapSortableFields')) {
            $fields = $model->mapSortableFields();
            $column = $fields[$column] ?? $column;
        }
        $this->setQueryBuilder($this->getQueryBuilder()->orderBy($column, $order));
        return $this;
    }

    /**
     * This method applies the search filter on the query
     *
     * @param $searchTerm
     *
     * @return $this
     */
    public function search($searchTerm)
    {
        if (null === $searchTerm) {
            return $this;
        }
        $query = $this->getQueryBuilder();
        $model = $this->getModel();
        if (method_exists($model, 'setSearchableFields')) {
            $fields = $model->setSearchableFields();
            $counter = 0;
            foreach ($fields as $field) {
                if ($counter === 0) {
                    $query = $query->where($field, 'like', "%$searchTerm%");
                } else {
                    $query = $query->orWhere($field, 'like', "%$searchTerm%");
                }
                $counter++;
            }
        }
        return $this;
    }
}
