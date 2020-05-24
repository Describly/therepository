<?php

namespace TheNandan\TheRepository\Repository\Traits;

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
        return $this->getQueryBuilder()->paginate($page->getPerPage(), $columns, 'page', $page->getPage());
    }
}
