<?php

namespace Rvzug\CanHasCompositeKey;

use Illuminate\Database\Eloquent\Builder;

/**
 *
 * Use this trait if your model has a composite primary key.
 * The primary key should then be an array with all possible applicable columns.
 * If one of the keys is not filled or null, this trait would not throw an Exception and ignore the key.
 *
 * Class CanHasCompositeKey
 * @package Rvzug\Traits
 */
trait CanHasCompositeKey
{
    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Set the keys for a save update query.
     *
     * @param  Builder $query
     * @return Builder
     * @throws Exception
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        foreach ($this->getKeyName() as $key) {
            if ($this->$key)
                $query->where($key, '=', $this->$key);
        }

        return $query;
    }
}
