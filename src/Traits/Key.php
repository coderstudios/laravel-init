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

use Auth;

trait Key
{
    public function key($str = '', $prefix = '')
    {
        $user = '';
        if (Auth::user()) {
            $user = '_'.Auth::user()->id.'_';
        }

        return $prefix.md5(app()->request->getUri().'_'.$str.$user);
    }
}
