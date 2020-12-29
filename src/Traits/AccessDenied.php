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

trait AccessDenied
{
    public $access_denied_redirect = 'admin.dashboard';

    public function accessDenied()
    {
        return redirect()->to(route($this->access_denied_redirect))->with('error', 'Access denied');
    }
}
