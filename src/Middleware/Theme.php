<?php
/**
 * Part of the Laravel-Init package by Coder Studios.
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

namespace CoderStudios\LaravelInit\Middleware;

use Closure;
use Config;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Theme extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param null|string ...$guards
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $path = 'views'.DIRECTORY_SEPARATOR.'theme'.DIRECTORY_SEPARATOR;
        if ($request->user()) {
            $theme = config('laravelinit.coderstudios.theme_folder');
            if ($request->user()->theme_folder && file_exists(resource_path($path.$theme))) {
                Config::set('laravelinit.coderstudios.theme_folder', 'theme.'.$theme.'.');
            }
        }

        return $next($request);
    }
}
