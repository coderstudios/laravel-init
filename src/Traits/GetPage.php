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

use Illuminate\Support\Facades\Request;

trait GetPage
{
    /**
     * Get Page Request Variable.
     *
     * @param  $string
     *
     * @return string
     */
    public function getPage()
    {
        $page = 1;
        if (Request::get('page')) {
            $page = Request::get('page');
        }

        return $page;
    }
}
