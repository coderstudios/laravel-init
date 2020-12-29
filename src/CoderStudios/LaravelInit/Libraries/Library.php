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

namespace CoderStudios\LaravelInit\Libraries;

class Library
{
    protected $cache;

    protected $model;

    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }

    public function newInstance()
    {
        return $this->model->newInstance();
    }

    public function create($data)
    {
        $this->cache->flush();

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $this->cache->flush();

        return $this->model->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        $this->cache->flush();

        return $this->model->where('id', $id)->delete();
    }
}
