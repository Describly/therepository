<?php

namespace TheNandan\TheRepository\Objects;

class Page
{
    private $searchTerm;
    private $perPage = 10;
    private $sortBy = [];
    private $page = 1;

    /**
     * @return mixed
     */
    public function getSearchTerm()
    {
        return $this->searchTerm;
    }

    /**
     * @param mixed $searchTerm
     */
    public function setSearchTerm($searchTerm): void
    {
        $this->searchTerm = $searchTerm;
    }

    /**
     * @return mixed
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param mixed $perPage
     */
    public function setPerPage($perPage): void
    {
        $this->perPage = $perPage;
    }

    /**
     * @return mixed
     */
    public function getSortBy(): array
    {
        return $this->sortBy;
    }

    /**
     * @param $column
     * @param $order
     */
    public function setSortBy($column, $order): void
    {
        $this->sortBy = [$column => $order];
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page): void
    {
        $this->page = $page;
    }
}
