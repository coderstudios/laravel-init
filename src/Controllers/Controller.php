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

namespace CoderStudios\LaravelInit\Controllers;

use App\Http\Controllers\Controller as LaravelController;
use CoderStudios\LaravelInit\Libraries\BreadCrumbLibrary;
use CoderStudios\LaravelInit\Traits\AccessDenied;
use CoderStudios\LaravelInit\Traits\CachedContent;
use CoderStudios\LaravelInit\Traits\Filled;
use CoderStudios\LaravelInit\Traits\GetPage;
use CoderStudios\LaravelInit\Traits\Key;
use CoderStudios\LaravelInit\Traits\NotFound;
use CoderStudios\LaravelInit\Traits\Shrink;
use Illuminate\Contracts\Cache\Factory as Cache;
use Illuminate\Http\Request;

class Controller extends LaravelController
{
    use Key;
    use CachedContent;
    use Shrink;
    use AccessDenied;
    use NotFound;
    use Filled;
    use GetPage;

    protected $cache;
    protected $request;
    protected $breadcrumb;

    /**
     * Create a new controller instance.
     */
    public function __construct(Cache $cache, Request $request, BreadCrumbLibrary $breadcrumb)
    {
        $this->request = $request;
        $this->breadcrumb = $breadcrumb;
        $this->cache = $cache->store(config('cache.default'));
    }

    public function getDir($str = 'DESC')
    {
        return 'DESC' == $str ? 'ASC' : 'DESC';
    }
}
