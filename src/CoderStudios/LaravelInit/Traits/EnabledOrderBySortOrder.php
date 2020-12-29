<?php
/**
 * Part of the Laravel Init package by Coder Studios.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the terms of the MIT license https://opensource.org/licenses/MIT
 *
 * @version    1.0.0
 *
 * @author     Coder Studios Ltd
 * @license    MIT https://opensource.org/licenses/MIT
 * @copyright  (c) 2020, Coder Studios Ltd
 *
 * @see       https://www.coderstudios.com
 */

namespace CoderStudios\LaravelInit\Traits;

use Cache;

trait EnabledOrderBySortOrder
{
    use Key;

    public function getEnabledOrderedBySortOrder($key = '')
    {
        $key = $this->key($key);
        $object = null;
        if (Cache::has($key) && config('laravelinit.coderstudios.cache_enabled')) {
            $object = Cache::get($key);
        } else {
            $object = $this->model->enabled()->orderBy('sort_order', 'ASC')->get();
            if (!is_null($object)) {
                Cache::add($key, $object, config('laravelinit.coderstudios.cache_duration'));
            }
        }

        return $object;
    }
}
