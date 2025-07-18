<?php

namespace MarcoRieser\LiveSearch\Traits;

use Illuminate\Support\Collection;
use Statamic\Facades\Search;
use Statamic\Facades\Site;
use Statamic\Search\QueryBuilder;

trait SearchFacade
{
    protected function search(string $query, ?string $index = null, int $limit = 10, ?string $site = null, int $offset = 0, bool $supplementData = true): Collection
    {
        $builder = Search::index($index)
            ->ensureExists()
            ->search($query)
            ->withData($supplementData)
            ->limit($limit);

        if ($offset) {
            $builder->offset($offset);
        }

        $this->querySite($builder, $site ?? Site::current()->handle());

        return $builder->get();
    }

    protected function querySite(QueryBuilder $query, string $site): void
    {
        if ($site === '*' || ! Site::hasMultiple()) {
            return;
        }

        $query->where('site', $site);
    }
}
