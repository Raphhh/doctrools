<?php
namespace Doctrools;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query;

trait GeneratorQueryTransformerTrait
{
    /**
     * @param Query $query
     * @param ArrayCollection|array|null $parameters The query parameters.
     * @param string|int $hydrationMode The hydration mode to use.
     * @return \Generator
     */
    protected function toEphemeralGenerator(Query $query, $parameters = null, $hydrationMode = Query::HYDRATE_OBJECT)
    {
        foreach ($query->iterate($parameters, $hydrationMode) as $row) {
            yield $row[0];
            $query->getEntityManager()->detach($row[0]);
        }
    }

    /**
     * @param Query $query
     * @param ArrayCollection|array|null $parameters The query parameters.
     * @param string|int $hydrationMode The hydration mode to use.
     * @return \Generator
     */
    protected function toGenerator(Query $query, $parameters = null, $hydrationMode = Query::HYDRATE_OBJECT)
    {
        foreach ($query->iterate($parameters, $hydrationMode) as $row) {
            yield $row[0];
        }
    }
}
