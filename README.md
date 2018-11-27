# doctrools
tools for Doctrine 2


## Examples

### GeneratorQueryTransformerTrait

```php
namespace AppBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrools\GeneratorQueryTransformerTrait

class MyRepository extends ServiceEntityRepository
{
    use GeneratorQueryTransformerTrait;

    /**
     * @param int $hydrationMode
     * @return \Generator
     */
    public function generateEphemeralAll($hydrationMode = AbstractQuery::HYDRATE_OBJECT)
    {
        return $this->toEphemeralGenerator(
            $this->createQueryBuilder('e')->getQuery(),
            null,
            $hydrationMode
        );
    }
}
```
