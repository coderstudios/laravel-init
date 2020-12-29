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

trait CachedContent
{
    public function useCachedContent($key = '')
    {
        if (Cache::has($key) && config('laravelinit.coderstudios.cache_enabled') && !session('errors') && !session('error') && !session('success')) {
            return Cache::get($key);
        }
    }
}
