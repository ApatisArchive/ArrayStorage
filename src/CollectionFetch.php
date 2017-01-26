<?php
namespace Apatis\ArrayStorage;

/**
 * Class CollectionFetch
 * @package Apatis\ArrayStorage
 */
class CollectionFetch extends Collection
{
    use ArrayBracketTrait;

    /**
     * Returning All collections
     *
     * @return array
     */
    public function collections()
    {
        return $this->all();
    }
}
