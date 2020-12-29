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

trait NotSet
{
    /**
     * Set enabled attribute.
     *
     * @param  $value
     * @param mixed $data
     * @param mixed $target
     *
     * @return collection
     */
    public function notSet($data = [], $target, $value)
    {
        if (!isset($data[$target])) {
            $data[$target] = $value;

            return $data;
        }

        return $data;
    }
}
