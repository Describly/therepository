<?php

namespace IamKeshariNandan\TheRepository\Http\Middleware;

use Closure;
use IamKeshariNandan\TheRepository\Objects\Page;

class RequestMapperMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $page = app(Page::class);
        if ($request->has(config('therepository.pagination.page_key'))) {
            $page->setPage($request->input(config('therepository.pagination.page_key')));
        }
        if ($request->has(config('therepository.pagination.per_page_key'))) {
            $page->setPerPage($request->input(config('therepository.pagination.per_page_key')));
        }
        if ($request->has(config('therepository.pagination.sorting_key'))) {
            $sortBy = explode(',', $request->input(config('therepository.pagination.sorting_key')));
            $column = $sortBy[0] ?? 'id';
            $order = $sortBy[1] ?? 'desc';
            $page->setSortBy($column, $order);
        }

        if ($request->has(config('therepository.search_key'))) {
            $page->setSearchTerm($request->input(config('therepository.search_key')));
        }

        return $next($request);
    }
}
