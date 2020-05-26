<?php

namespace TheNandan\TheRepository\Utilities\Contracts;

interface TheRepositoryInterface
{
    /**
     * This method provides the mapping of the request key and database table columns
     *
     * @return array
     */
    public function mapRequestFields(): array ;

    /**
     * This method maps the list of request sortable keys with table columns
     *
     * @return array
     */
    //public function mapSortableFields(): array ;
}
